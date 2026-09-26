<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_video_production_page_renders_with_spam_fields_and_novalidate()
    {
        $res = $this->get('/video-production-in-gurgaon');
        $res->assertOk();
        $html = $res->getContent();
        $this->assertStringContainsString('id="contactForm" novalidate', $html);
        $this->assertStringContainsString('name="website_url"', $html);
        $this->assertStringContainsString('name="_ts"', $html);
    }
}
