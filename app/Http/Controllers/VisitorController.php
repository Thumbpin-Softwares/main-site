<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $projects = $this->getProjects();
        return view('visitors.index', compact('projects'));
    }

    private function getProjects()
    {
        $projects = [];

        // Digital
        // Digital has a flat list of images/gifs in assets/img/work/digital/
        // Based on digital.blade.php, they are 01.jpg to 22.gif (some are jpg, some gif)
        // I'll just hardcode the list based on the file view I saw earlier or just use a glob if I could, but hardcoding is safer for now to match the view exactly.
        // Actually, the view had classes like 'post' and 'campaign'. I should probably capture that if possible, but for now I'll just dump them all in 'Digital'.
        $digitalImages = [
            ['file' => '01.jpg', 'type' => 'post'],
            ['file' => '02.jpg', 'type' => 'post'],
            ['file' => '03.jpg', 'type' => 'campaign'],
            ['file' => '04.jpg', 'type' => 'campaign'],
            ['file' => '05.jpg', 'type' => 'post'],
            ['file' => '06.jpg', 'type' => 'post'],
            ['file' => '07.jpg', 'type' => 'campaign'],
            ['file' => '08.jpg', 'type' => 'campaign'],
            ['file' => '09.jpg', 'type' => 'post'],
            ['file' => '10.jpg', 'type' => 'post'],
            // 11-14 were commented out in the view
            ['file' => '15.jpg', 'type' => 'campaign'],
            ['file' => '16.gif', 'type' => 'post'],
            ['file' => '17.gif', 'type' => 'post'],
            ['file' => '18.gif', 'type' => 'campaign'],
            ['file' => '19.gif', 'type' => 'campaign'],
            ['file' => '20.gif', 'type' => 'post'],
            ['file' => '21.gif', 'type' => 'post'],
            ['file' => '22.gif', 'type' => 'campaign'],
        ];

        foreach ($digitalImages as $img) {
            $projects[] = [
                'category' => 'Digital',
                'category_slug' => 'digital',
                'project' => $img['type'] == 'post' ? 'Social Media Posts' : 'Campaigns', // Grouping them roughly
                'project_slug' => $img['type'],
                'image' => asset('assets/img/work/digital/' . $img['file']),
                'type' => 'image', // or gif, treated as image
                'route' => route('digital')
            ];
        }

        // Print
        // Structure: assets/img/work/print/{project_slug}/{file}
        $printProjects = [
            'zero_waste' => 'Zero Waste',
            'mr_furniture' => 'Mr Furniture',
            'probity' => 'Probity Corporate',
            'psb_logistics' => 'PSB Logistics',
            'grafis_nusantara_sticker' => 'Grafis Nusantara Sticker',
            '7-sins' => '7 Sins',
            'cure-j' => 'Cure J',
            's21-cafe' => 'S21 Cafe'
        ];

        foreach ($printProjects as $slug => $name) {
            // Get all images in the directory
            $path = public_path('assets/img/work/print/' . $slug);
            if (is_dir($path)) {
                $files = scandir($path);
                foreach ($files as $file) {
                    if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        $projects[] = [
                            'category' => 'Print',
                            'category_slug' => 'print',
                            'project' => $name,
                            'project_slug' => $slug,
                            'image' => asset('assets/img/work/print/' . $slug . '/' . $file),
                            'type' => 'image',
                            'route' => route($slug == 'zero_waste' ? 'zero_waste' : $slug) // Handle route naming inconsistencies if any
                        ];
                    }
                }
            }
        }

        // Branding
        $brandingProjects = [
            'mr_furniture' => 'Mr Furniture',
            'tobako_house' => 'Tobako House',
            'bloom' => 'Bloom',
            'kobo' => 'Kobo',
            'printogram' => 'Printogram',
            'psb_logistics' => 'PSB Logistics'
        ];

        foreach ($brandingProjects as $slug => $name) {
            $path = public_path('assets/img/work/branding/' . $slug);
            if (is_dir($path)) {
                $files = scandir($path);
                foreach ($files as $file) {
                    if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        $projects[] = [
                            'category' => 'Branding',
                            'category_slug' => 'branding',
                            'project' => $name,
                            'project_slug' => $slug,
                            'image' => asset('assets/img/work/branding/' . $slug . '/' . $file),
                            'type' => 'image',
                            'route' => route($slug) // Assuming route names match slugs mostly
                        ];
                    }
                }
            }
        }

        // Website
        // Website seems to use videos mostly in the main view, but let's check if there are sub-pages with images.
        // For now, I'll add the main videos/images from the website.blade.php
        $websiteProjects = [
            ['slug' => 'psb-logistics-website', 'name' => 'PSB Logistics', 'file' => 'psb-logistics.mp4', 'type' => 'video'],
            ['slug' => 'zero-waste-website', 'name' => 'Zero Waste', 'file' => 'zero-waste.mp4', 'type' => 'video'],
            ['slug' => 'mr-furniture-website', 'name' => 'Mr Furniture', 'file' => 'mr-furniture.mp4', 'type' => 'video'],
            ['slug' => 'mr-skips-website', 'name' => 'Mr Skips', 'file' => 'mr-skips.mp4', 'type' => 'video'],
            ['slug' => 'probity-website', 'name' => 'Probity', 'file' => 'probity.mp4', 'type' => 'video'],
        ];

        foreach ($websiteProjects as $proj) {
             $projects[] = [
                'category' => 'Website',
                'category_slug' => 'website',
                'project' => $proj['name'],
                'project_slug' => $proj['slug'],
                'image' => asset('assets/img/work/website/' . $proj['file']),
                'type' => $proj['type'],
                'route' => route($proj['slug'])
            ];
        }

        return $projects;
    }
}
