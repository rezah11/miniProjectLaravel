<?php

namespace Database\Seeders;

use App\Models\Link;

//use http\Client\Curl\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('links')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $user = User::find(3);
        $link = [
            'https://aradbranding.com/fa/the-price-of-coarse-and-uniform-dried-garlic-in-the-export-market-with-high-quality/',
            'https://aradbranding.com/fa/saveh-pomegranate-paste-with-unique-taste/',
            'https://aradbranding.com/fa/buy-tarem-rice-from-fereydoun-kanaar-online/',
            'https://aradbranding.com/fa/nano-freezer-bag-in-models/',
            'https://aradbranding.com/fa/buy-homemade-and-industrial-pomegranate-paste-in-all-kinds-of-flavors/',
            'https://aradbranding.com/fa/20-properties-of-dark-chocolate-for-body-health/',
            'https://aradbranding.com/fa/the-price-of-qazvin-vineyard-raisins-with-the-best-quality-and-immediate-delivery/',
            'https://aradbranding.com/fa/wholesale-sale-of-quality-paper-skin-walnuts-at-the-best-market-price/',
            'https://aradbranding.com/fa/the-properties-of-rose-water-for-hair-of-the-two-atisheh-type-for-growth/',
            'https://aradbranding.com/fa/selling-fresh-and-completely-organic-apricot-juice/',
            'https://aradbranding.com/fa/selling-red-apples-in-bulk/',
            'https://aradbranding.com/fa/the-price-of-shelled-white-peanuts-in-wholesale-markets-with-the-best-quality/',
            'https://aradbranding.com/fa/homemade-vegetable-chopper/',
            'https://aradbranding.com/fa/how-to-prepare-sunny-pilaf-raisins-in-different-ways-in-indoor-places/',
            'https://aradbranding.com/fa/natural-ostrich-feather-duster-with-high-diversity-in-different-uses-and-its-interesting-uses/',
            'https://aradbranding.com/fa/buy-cherry-concentrate-in-urmia-and-mashhad-with-high-brix/',
            'https://aradbranding.com/fa/types-of-double-glazed-glass-to-insulate-the-window-structure/',
            'https://aradbranding.com/fa/buying-patterned-ceramic-mugs-in-various-models/',
            'https://aradbranding.com/fa/the-price-of-exported-and-produced-raisins/',
            'https://aradbranding.com/fa/buy-girls-sandals-in-different-iranian-and-foreign-types-directly-from-the-factory/',
        ];
        foreach ($link as $key => $value) {
            $this->createLinkForUser($user, $value);
        }
    }

    private function createLinkForUser(\App\Models\User $user, $link)
    {
        Link::createWithSlug($user, $link);
//        dd($)
//        $count=$user->link()->count() + 1;
//        $slug=$user->id.$count;
//        Link::query()->create([
//            'user_id'=>$user->id,
//            'link'=>$link,
//            'slug'=>$slug,
////            'user_id'=>$user->id,
//        ]);
    }
}
