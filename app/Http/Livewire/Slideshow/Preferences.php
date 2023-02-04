<?php

namespace App\Http\Livewire\Slideshow;

use App\Models\SlideshowPreference;
use App\Models\SlideshowSample;
use Livewire\Component;

class Preferences extends Component
{
    public $tribute;

    public $styles;
    public $themes;
    public $musics;
    public $package_themes;

    public $preference;

    public $style_id;
    public $theme_id;
    public $music1_id;
    public $music2_id;
    public $music3_id;
    public $music4_id;
    public $music5_id;
    public $package_theme_id;

    public function mount($tribute)
    {
        $this->tribute = $tribute;

        $this->styles = SlideshowSample::select('id', 'type', 'title', 'path')
            ->where('type', 1)
            ->get();

        $this->themes = SlideshowSample::select('id', 'type', 'title', 'path')
            ->where('type', 2)
            ->get();

        $this->musics = SlideshowSample::select('id', 'type', 'title', 'path')
            ->where('type', 3)
            ->get();

        $this->package_themes = SlideshowSample::select('id', 'type', 'title', 'path')
            ->where('type', 4)
            ->get();

        $preference = SlideshowPreference::where('tribute_id', $tribute->id)->first();
        $this->preference = $preference;
        if ($preference) {
            $this->style_id = $preference->style_id;
            $this->theme_id = $preference->theme_id;
            $this->music1_id = $preference->music1_id;
            $this->music2_id = $preference->music2_id;
            $this->music3_id = $preference->music3_id;
            $this->music4_id = $preference->music4_id;
            $this->music5_id = $preference->music5_id;
            $this->package_theme_id = $preference->package_theme_id;
        }
    }

    // Begin: Style
    public function updatedStyleId()
    {
        $this->saveStyle($this->style_id);
    }
    public function selectStyle($style_id)
    {
        $this->style_id = $style_id;
        $this->saveStyle($style_id);
    }
    public function saveStyle($style_id)
    {
        SlideshowPreference::updateOrCreate(
            ['tribute_id' => $this->tribute->id],
            ['style_id' => $style_id]
        );
    }
    // End: Style

    // Begin: Theme
    public function updatedThemeId()
    {
        $this->saveTheme($this->theme_id);
    }
    public function selectTheme($theme_id)
    {
        $this->theme_id = $theme_id;
        $this->saveTheme($theme_id);
    }
    public function saveTheme($theme_id)
    {
        SlideshowPreference::updateOrCreate(
            ['tribute_id' => $this->tribute->id],
            ['theme_id' => $theme_id]
        );
    }
    // End: Theme

    // Begin: Music
    public function selectMusic($music_id, $selection)
    {
        $this->$selection = $music_id;
        $this->saveMusic($selection, $music_id);
    }
    public function saveMusic($selection, $music_id)
    {
        SlideshowPreference::updateOrCreate(
            ['tribute_id' => $this->tribute->id],
            [$selection => $music_id]
        );
    }
    public function randomMusic()
    {
        $musics = SlideshowSample::select('id', 'type', 'title', 'path')
            ->where('type', 3)
            ->inRandomOrder()
            ->take(5)
            ->get();

        SlideshowPreference::updateOrCreate(
            ['tribute_id' => $this->tribute->id],
            [
                'music1_id' => $musics[0]['id'],
                'music2_id' => $musics[1]['id'],
                'music3_id' => $musics[2]['id'],
                'music4_id' => $musics[3]['id'],
                'music5_id' => $musics[4]['id'],
            ]
        );

        return redirect()->route('ui.slideshow.edit');
    }
    // End: Music

    // Begin: Package Theme
    public function updatedPackageThemeId()
    {
        $this->savePackageTheme($this->package_theme_id);
    }
    public function selectPackageTheme($package_theme_id)
    {
        $this->package_theme_id = $package_theme_id;
        $this->savePackageTheme($package_theme_id);
    }
    public function savePackageTheme($package_theme_id)
    {
        SlideshowPreference::updateOrCreate(
            ['tribute_id' => $this->tribute->id],
            ['package_theme_id' => $package_theme_id]
        );
    }
    // End: Package Theme

    public function render()
    {
        return view('livewire.slideshow.preferences');
    }
}
