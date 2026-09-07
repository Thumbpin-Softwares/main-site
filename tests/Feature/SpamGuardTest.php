<?php
namespace Tests\Feature;
use App\Models\InquiryForm;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpamGuardTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $over = []): array
    {
        return array_merge([
            'name' => 'Real Person', 'email' => 'real@example.com',
            'mobile' => '9876543210', 'requirement' => 'We need a property video.',
            '_ts' => app(\App\Support\SpamGuard\SpamGuard::class)->signedTimestamp(),
        ], $over);
    }

    public function test_honeypot_flags_submission()
    {
        $this->withServerVariables(['HTTP_USER_AGENT' => 'Mozilla/5.0'])
             ->post('/inquiry-form', $this->payload(['website_url' => 'http://spam.ru']));
        $row = InquiryForm::latest('id')->first();
        $this->assertTrue((bool) $row->is_spam, 'honeypot should flag');
        $this->assertStringContainsString('honeypot', $row->spam_reasons);
    }

    public function test_fast_submission_plus_bot_agent_flags()
    {
        $this->withServerVariables(['HTTP_USER_AGENT' => 'python-requests/2.31'])
             ->post('/inquiry-form', $this->payload());
        $row = InquiryForm::latest('id')->first();
        $this->assertTrue((bool) $row->is_spam, 'too_fast + bot_agent should reach threshold');
    }

    public function test_genuine_submission_is_not_flagged()
    {
        // Stamp issued 30s ago: a human filling the form at human speed.
        $guard = app(\App\Support\SpamGuard\SpamGuard::class);
        $ref = new \ReflectionMethod($guard, 'timestampHash');
        $ref->setAccessible(true);
        $t = time() - 30;
        $ts = $t . '.' . $ref->invoke($guard, $t);

        $this->withServerVariables(['HTTP_USER_AGENT' => 'Mozilla/5.0 (Macintosh) AppleWebKit/537.36 Chrome/120 Safari/537.36'])
             ->post('/inquiry-form', $this->payload(['_ts' => $ts, 'requirement' => 'Unique text '.uniqid()]));
        $row = InquiryForm::latest('id')->first();
        $this->assertFalse((bool) $row->is_spam, 'genuine lead must not be flagged. reasons: '.$row->spam_reasons);
        $this->assertSame(0, (int) $row->spam_score);
    }

    public function test_form_page_renders_the_invisible_fields()
    {
        $html = $this->get('/contact')->getContent();
        $this->assertStringContainsString('name="website_url"', $html, 'honeypot missing from page');
        $this->assertStringContainsString('name="_ts"', $html, 'timing stamp missing from page');
        $this->assertStringContainsString('tabindex="-1"', $html, 'honeypot must be unreachable by keyboard');
    }

    public function test_forged_timestamp_is_rejected()
    {
        $this->withServerVariables(['HTTP_USER_AGENT' => 'Mozilla/5.0'])
             ->post('/inquiry-form', $this->payload(['_ts' => (time()-500).'.deadbeef']));
        $row = InquiryForm::latest('id')->first();
        $this->assertStringContainsString('bad_timestamp', $row->spam_reasons);
    }
}
