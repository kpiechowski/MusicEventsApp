<?php

namespace App\Livewire;

use Livewire\Component;

#[Lazy]
class Image extends Component
{

    private string | null $src =null;
    public string $alt;
    public string $class;
    public int $width;
    public int $height;
    public string $svg;

    
    public function getImageDimmensions(){
        if (!$this->src)
            return;

        $imagePath = public_path($this->src);
        if (!file_exists($imagePath))
            return false;
        
            
        $dimensions =getimagesize($imagePath);
        $this->width = $dimensions[0];
        $this->height = $dimensions[1];
        
        return true;
    }

    public function generateSvgPlaceholder(int $width, int $height){

        $svgContent = '<?xml version="1.0" encoding="UTF-8"?>';
        $svgContent .= '<svg width="' . intval($this->width) . '" height="' . intval($height) . '" xmlns="http://www.w3.org/2000/svg">';
        $svgContent .= '<rect width="100%" height="100%" fill="#ddd" />';
        $svgContent .= '<text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#aaa" font-size="20" font-family="Arial" dy=".3em">' . $this->width . 'x' . $this->height . '</text>';
        $svgContent .= '</svg>';

        return 'data:image/svg+xml;base64,' . base64_encode($svgContent);
    }




    public function placeholder()
    {

        return <<<'HTML'
        <div>
            <!-- Loading spinner... -->
            <svg>...</svg>
        </div>
        HTML;


        
    }

    public function mount($src = null) {

        $this->src = $src;

        if($this->getImageDimmensions()){
            $this->svg = $this->generateSvgPlaceholder($this->width, $this->height);
        }
    }


    public function render()
    {
        return view('livewire.components.image');
    }
}
