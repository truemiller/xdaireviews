<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->createProject(
            "agave",
            "Agave",
            "xDai's core lending protocol. They support farming and staking. As well as lending and borrowing.",
            "https://assets.coingecko.com/coins/images/14146/large/agve.png?1614659384",
            "https://agave.finance/"
        );
        $this->createProject(
            "honeyswap",
            "Honey Swap",
            "Honey Swap is xDai's core DEX. They also aggregating swap routing with multiple DEXs. Ensuring the best value is given to the user.",
            "https://assets.coingecko.com/markets/images/599/large/honeyswap.png?1603246921",
            "https://honeyswap.org/"
        );
        $this->createProject("sushi", "Sushi Swap", "Sushi is one of the world's largest DEXs. They also have a crosschain bridge on multiple chains.", "https://s2.coinmarketcap.com/static/img/coins/200x200/6758.png");
        $this->createProject("elkfinance", "Elk Finance", "Elk Finance is a popular decentralized exchange. They have a multi-chain bridge with over 12 chains. And impermanent loss protection for farmers.", "https://s2.coinmarketcap.com/static/img/coins/200x200/10095.png");
        $this->createProject("curve", "Curve", ".", "https://curve.fi/logo.png");
        $this->createProject("bao", "Bao Finance", "", "https://www.bao.finance/static/media/bao-banner.90e5acb6.png");
        $this->createProject("omen", "Omen", "", "https://pbs.twimg.com/profile_images/1231645048577589253/6fcvHPi0_400x400.jpg");
        $this->createProject("swapr", "Swapr", "", "https://icons.llama.fi/swapr.svg");
        $this->createProject("perpetual", "Perpetual Protocol", "", "https://assets.coingecko.com/coins/images/12381/small/60d18e06844a844ad75901a9_mark_only_03.png?1628674771");
        $this->createProject("gnosis", "Gnosis", "", "https://assets.coingecko.com/coins/images/662/small/logo_square_simple_300px.png?1609402668");
        $this->createProject("origintrail", "OriginTrail", "", "https://assets.coingecko.com/coins/images/1877/small/TRAC.jpg?1635134367");
        $this->createProject("streamr", "Streamr XDATA ", "", "https://assets.coingecko.com/coins/images/1115/small/streamr.png?1547035101");
    }

    public function createProject($slug, $name, $description, $logo, $url="#")
    {
        (new Project())->updateOrCreate(["slug" => "$slug"], ["name" => "$name", "description" => "$description", "logo" => "$logo", "url"=>"$url"])->save();
    }
}
