<?php

namespace App\Console\Commands;

use App\Models\Banner;
use App\Models\Project;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'generate:sitemap';

    protected $description = 'Generate sitemap';

    public function handle(): void
    {
        /* @var Media $image */

        $sitemap = Sitemap::create();

        $mainUrl = Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0);


        $banners = Banner::active()->with('media')->get();
        foreach ($banners as $banner) {
            foreach ($banner->media as $image) {
                $mainUrl->addImage($image->getUrl());
            }
        }

        $sitemap->add($mainUrl);

        $sitemap->add(
            Url::create('/projects')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );

        $activeProjects = Project::active()->with('media')->get();
        foreach ($activeProjects as $project) {
            $projectUrl = Url::create("/projects/$project->slug")
                ->setLastModificationDate($project->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7);

            foreach($project->media as $image) {
                $projectUrl->addImage($image->getUrl());
            }

            $sitemap->add($projectUrl);
        }

        $sitemap->add(
            Url::create('/plans')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create('/about-us')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.6)
        );

        $sitemap->add(
            Url::create('/faq')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.6)
        );

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap успішно згенеровано!');
    }
}

