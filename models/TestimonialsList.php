<?php

namespace app\models;

class TestimonialsList extends \app\core\Model
{

    public function rules(): array
    {
        // TODO: Implement rules() method.
    }

    public function render()
    {
        $html = '<div class="p-top">';
        $testimonials = Testimony::findAll();
        foreach ($testimonials as $testimony) {
            $html .= '<div class="col testemunho">';
            $html .= '<div class="row mt-3 justify-content-start fs-5">';
            $html .= $testimony->testimony ;
            $html .= '</div><div class="row">';
            $html .= '- ' . $testimony->author ;
            $html .= '</div></div>';
        }
        $html .= '</div>';
        return $html;
    }
}