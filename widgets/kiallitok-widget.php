<?php
/**
 * Kiállítók Widget Class
 */

if (!defined('ABSPATH')) {
    exit;
}

class Kiallitok_Widget extends \Elementor\Widget_Base {
    
    public function get_name() {
        return 'kiallitok_widget';
    }
    
    public function get_title() {
        return esc_html__('Kiállítók', 'zeusweb');
    }
    
    public function get_icon() {
        return 'eicon-gallery-grid';
    }
    
    public function get_categories() {
        return ['zeusweb'];
    }
    
    public function get_keywords() {
        return ['kiállítók', 'exhibitors', 'gallery', 'partners', 'sponsors'];
    }
    
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Kiállítók', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Kép', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Cím', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Kiállító neve', 'zeusweb'),
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Leírás', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Kiállító leírása ide jön...', 'zeusweb'),
                'rows' => 4,
                'show_label' => false,
            ]
        );
        
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'zeusweb'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );
        
        $this->add_control(
            'exhibitors',
            [
                'label' => esc_html__('Kiállítók', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Első Kiállító', 'zeusweb'),
                        'text' => esc_html__('Az első kiállító leírása. Ez egy részletes leírás az első kiállítóról és szolgáltatásairól.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Második Kiállító', 'zeusweb'),
                        'text' => esc_html__('A második kiállító leírása. Kiváló minőségű termékek és szolgáltatások.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmadik kiállító leírása. Innovatív megoldások és modern technológiák.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyedik kiállító leírása. Megbízható partner és hosszú évek tapasztalata.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Ötödik Kiállító', 'zeusweb'),
                        'text' => esc_html__('Az ötödik kiállító leírása. Kreatív megoldások és egyedi megközelítés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Hatodik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A hatodik kiállító leírása. Professzionális szolgáltatások és minőségi garancia.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Hetedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A hetedik kiállító leírása. Szakértői tudás és tapasztalat.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Nyolcadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A nyolcadik kiállító leírása. Innovatív technológiák és megoldások.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Kilencedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A kilencedik kiállító leírása. Megbízható partner és hosszú távú együttműködés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizedik kiállító leírása. Kiváló minőség és versenyképes árak.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenegyedik kiállító leírása. Professzionális megközelítés és szakértői tudás.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenkettedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenkettedik kiállító leírása. Innovatív megoldások és kreatív megközelítés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenharmadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenharmadik kiállító leírása. Megbízható szolgáltatások és hosszú évek tapasztalata.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizennegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizennegyedik kiállító leírása. Kiváló minőség és versenyképes árak.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenötödik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenötödik kiállító leírása. Professzionális megközelítés és szakértői tudás.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenhatodik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenhatodik kiállító leírása. Innovatív technológiák és modern megoldások.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenhetedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenhetedik kiállító leírása. Megbízható partner és hosszú távú együttműködés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizennyolcadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizennyolcadik kiállító leírása. Kreatív megoldások és egyedi megközelítés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Tizenkilencedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A tizenkilencedik kiállító leírása. Szakértői tudás és tapasztalat.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszadik kiállító leírása. Professzionális szolgáltatások és minőségi garancia.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonegyedik kiállító leírása. Innovatív megoldások és modern technológiák.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonkettedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonkettedik kiállító leírása. Megbízható partner és hosszú évek tapasztalata.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonharmadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonharmadik kiállító leírása. Kiváló minőség és versenyképes árak.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonnegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonnegyedik kiállító leírása. Professzionális megközelítés és szakértői tudás.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonötödik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonötödik kiállító leírása. Innovatív technológiák és kreatív megoldások.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonhatodik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonhatodik kiállító leírása. Megbízható szolgáltatások és hosszú távú együttműködés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonhetedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonhetedik kiállító leírása. Kreatív megoldások és egyedi megközelítés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonnyolcadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonnyolcadik kiállító leírása. Szakértői tudás és tapasztalat.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Huszonkilencedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A huszonkilencedik kiállító leírása. Professzionális szolgáltatások és minőségi garancia.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmincadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmincadik kiállító leírása. Innovatív megoldások és modern technológiák.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmincegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmincegyedik kiállító leírása. Megbízható partner és hosszú évek tapasztalata.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harminckettedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harminckettedik kiállító leírása. Kiváló minőség és versenyképes árak.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmincharmadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmincharmadik kiállító leírása. Professzionális megközelítés és szakértői tudás.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmincnegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmincnegyedik kiállító leírása. Innovatív technológiák és kreatív megoldások.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmincötödik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmincötödik kiállító leírása. Megbízható szolgáltatások és hosszú távú együttműködés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harminchatodik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harminchatodik kiállító leírása. Kreatív megoldások és egyedi megközelítés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harminchetedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harminchetedik kiállító leírása. Szakértői tudás és tapasztalat.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harmincnyolcadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harmincnyolcadik kiállító leírása. Professzionális szolgáltatások és minőségi garancia.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Harminckilencedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A harminckilencedik kiállító leírása. Innovatív megoldások és modern technológiák.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenedik kiállító leírása. Megbízható partner és hosszú évek tapasztalata.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenegyedik kiállító leírása. Kiváló minőség és versenyképes árak.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenkettedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenkettedik kiállító leírása. Professzionális megközelítés és szakértői tudás.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenharmadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenharmadik kiállító leírása. Innovatív technológiák és kreatív megoldások.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvennegyedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvennegyedik kiállító leírása. Megbízható szolgáltatások és hosszú távú együttműködés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenötödik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenötödik kiállító leírása. Kreatív megoldások és egyedi megközelítés.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenhatodik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenhatodik kiállító leírása. Szakértői tudás és tapasztalat.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenhetedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenhetedik kiállító leírása. Professzionális szolgáltatások és minőségi garancia.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvennyolcadik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvennyolcadik kiállító leírása. Innovatív megoldások és modern technológiák.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Negyvenkilencedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('A negyvenkilencedik kiállító leírása. Megbízható partner és hosszú évek tapasztalata.', 'zeusweb'),
                    ],
                    [
                        'title' => esc_html__('Ötvenedik Kiállító', 'zeusweb'),
                        'text' => esc_html__('Az ötvenedik kiállító leírása. Kiváló minőség és versenyképes árak.', 'zeusweb'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        
        $this->end_controls_section();
        
        // Layout Section
        $this->start_controls_section(
            'layout_section',
            [
                'label' => esc_html__('Elrendezés', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        

        
        $this->add_control(
            'image_position',
            [
                'label' => esc_html__('Kép pozíció', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'top' => esc_html__('Felül', 'zeusweb'),
                    'left' => esc_html__('Balra', 'zeusweb'),
                    'right' => esc_html__('Jobbra', 'zeusweb'),
                ],
            ]
        );
        
        $this->add_control(
            'items_per_page',
            [
                'label' => esc_html__('Elemek oldalanként', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
                'min' => 1,
                'max' => 50,
                'step' => 1,
            ]
        );
        
        $this->end_controls_section();
        
        // Style Section: Container
        $this->start_controls_section(
            'section_style_container',
            [
                'label' => esc_html__('Konténer', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'grid_gap',
            [
                'label' => esc_html__('Térköz', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__('Keret', 'zeusweb'),
                'selector' => '{{WRAPPER}} .kiallitok-container',
            ]
        );
        
        $this->add_control(
            'container_border_radius',
            [
                'label' => esc_html__('Keret sugár', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'container_background_color',
            [
                'label' => esc_html__('Háttér szín', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-container' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'container_padding',
            [
                'label' => esc_html__('Belső térköz', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        // Style Section: Item
        $this->start_controls_section(
            'section_style_item',
            [
                'label' => esc_html__('Elem', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'label' => esc_html__('Keret', 'zeusweb'),
                'selector' => '{{WRAPPER}} .kiallitok-item',
            ]
        );
        
        $this->add_control(
            'item_border_radius',
            [
                'label' => esc_html__('Keret sugár', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'item_background_color',
            [
                'label' => esc_html__('Háttér szín', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'item_padding',
            [
                'label' => esc_html__('Belső térköz', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'label' => esc_html__('Árnyék', 'zeusweb'),
                'selector' => '{{WRAPPER}} .kiallitok-item',
            ]
        );
        
        $this->end_controls_section();
        
        // Style Section: Image
        $this->start_controls_section(
            'section_style_image',
            [
                'label' => esc_html__('Kép', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Szélesség', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__('Magasság', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__('Keret sugár', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Keret', 'zeusweb'),
                'selector' => '{{WRAPPER}} .kiallitok-image img',
            ]
        );
        
        $this->end_controls_section();
        
        // Style Section: Title
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__('Cím', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .kiallitok-title',
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Szöveg szín', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Külső térköz', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        // Style Section: Text
        $this->start_controls_section(
            'section_style_text',
            [
                'label' => esc_html__('Szöveg', 'zeusweb'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .kiallitok-text',
            ]
        );
        
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Szöveg szín', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'text_margin',
            [
                'label' => esc_html__('Külső térköz', 'zeusweb'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .kiallitok-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if (empty($settings['exhibitors'])) {
            return;
        }
        
        $items_per_page = $settings['items_per_page'] ?: 10;
        $total_items = count($settings['exhibitors']);
        $total_pages = ceil($total_items / $items_per_page);
        
        $this->add_render_attribute('wrapper', 'class', 'kiallitok-wrapper');
        $this->add_render_attribute('grid', 'class', 'kiallitok-grid');
        $this->add_render_attribute('grid', 'class', 'kiallitok-image-' . $settings['image_position']);
        $this->add_render_attribute('grid', 'style', 'display: flex !important; flex-direction: column !important; gap: 30px !important; width: 100% !important;');
        ?>
        
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <div class="kiallitok-container">
                <div <?php echo $this->get_render_attribute_string('grid'); ?>>
                    <?php foreach ($settings['exhibitors'] as $index => $item) : ?>
                        <?php 
                        $page_number = floor($index / $items_per_page) + 1;
                        $item_class = 'kiallitok-item';
                        if ($page_number === 1) {
                            $item_class .= ' active';
                        }
                        ?>
                        <div class="<?php echo esc_attr($item_class); ?>" data-page="<?php echo esc_attr($page_number); ?>" style="display: <?php echo $page_number === 1 ? 'flex' : 'none'; ?> !important; flex-direction: row !important; align-items: flex-start !important; gap: 20px !important; width: 100% !important; background: none !important; border-radius: 0 !important; padding: 20px !important; box-shadow: none !important; margin-bottom: 0 !important;">
                            <?php if (!empty($item['image']['url'])) : ?>
                                <div class="kiallitok-image" style="flex-shrink: 0 !important; text-align: center !important; min-width: 200px !important; max-width: 200px !important; width: 200px !important;">
                                    <?php if (!empty($item['link']['url'])) : ?>
                                        <a href="<?php echo esc_url($item['link']['url']); ?>"
                                           <?php echo $item['link']['is_external'] ? 'target="_blank"' : ''; ?>
                                           <?php echo $item['link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                            <img src="<?php echo esc_url($item['image']['url']); ?>" 
                                                 alt="<?php echo esc_attr($item['title']); ?>"
                                                 style="width: 200px !important; height: 200px !important; object-fit: cover !important; max-width: 200px !important; max-height: 200px !important; min-width: 200px !important; min-height: 200px !important;">
                                        </a>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($item['image']['url']); ?>" 
                                             alt="<?php echo esc_attr($item['title']); ?>"
                                             style="width: 200px !important; height: 200px !important; object-fit: cover !important; max-width: 200px !important; max-height: 200px !important; min-width: 200px !important; min-height: 200px !important;">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="kiallitok-content">
                                <?php if (!empty($item['title'])) : ?>
                                    <h3 class="kiallitok-title">
                                        <?php if (!empty($item['link']['url'])) : ?>
                                            <a href="<?php echo esc_url($item['link']['url']); ?>"
                                               <?php echo $item['link']['is_external'] ? 'target="_blank"' : ''; ?>
                                               <?php echo $item['link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                <?php echo esc_html($item['title']); ?>
                                            </a>
                                        <?php else : ?>
                                            <?php echo esc_html($item['title']); ?>
                                        <?php endif; ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <?php if (!empty($item['text'])) : ?>
                                    <div class="kiallitok-text">
                                        <?php echo wp_kses_post($item['text']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if ($total_pages > 1) : ?>
                    <div class="kiallitok-pagination">
                        <button class="kiallitok-pagination-arrow kiallitok-pagination-arrow-left" data-direction="prev" disabled>
                            <div class="kiallitok-pagination-arrow-img">
                                <svg width="23" height="36" viewBox="0 0 23 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 4.87988L19.0437 17.6208" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                    <path d="M4 31L19.0437 18.2591" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </button>
                        
                        <div class="kiallitok-pagination-dots">
                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <button class="kiallitok-pagination-dot <?php echo $i === 1 ? 'active' : ''; ?>" data-page="<?php echo esc_attr($i); ?>"></button>
                            <?php endfor; ?>
                        </div>
                        
                        <button class="kiallitok-pagination-arrow kiallitok-pagination-arrow-right" data-direction="next" <?php echo $total_pages <= 1 ? 'disabled' : ''; ?>>
                            <div class="kiallitok-pagination-arrow-img">
                                <svg width="23" height="36" viewBox="0 0 23 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 4.87988L19.0437 17.6208" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                    <path d="M4 31L19.0437 18.2591" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php
    }
    
    protected function content_template() {
        ?>
        <# if (settings.exhibitors.length) { #>
            <div class="kiallitok-wrapper">
                <div class="kiallitok-container">
                    <div class="kiallitok-grid kiallitok-image-{{ settings.image_position }}">
                        <# _.each(settings.exhibitors, function(item, index) { #>
                            <div class="kiallitok-item">
                                <# if (item.image.url) { #>
                                    <div class="kiallitok-image" style="flex-shrink: 0 !important; text-align: center !important; min-width: 200px !important; max-width: 200px !important; width: 200px !important;">
                                        <# if (item.link.url) { #>
                                            <a href="{{ item.link.url }}"
                                               <# if (item.link.is_external) { #>target="_blank"<# } #>
                                               <# if (item.link.nofollow) { #>rel="nofollow"<# } #>>
                                                <img src="{{ item.image.url }}" alt="{{ item.title }}">
                                            </a>
                                        <# } else { #>
                                            <img src="{{ item.image.url }}" alt="{{ item.title }}">
                                        <# } #>
                                    </div>
                                <# } #>
                                
                                <div class="kiallitok-content">
                                    <# if (item.title) { #>
                                        <h3 class="kiallitok-title">
                                            <# if (item.link.url) { #>
                                                <a href="{{ item.link.url }}"
                                                   <# if (item.link.is_external) { #>target="_blank"<# } #>
                                                   <# if (item.link.nofollow) { #>rel="nofollow"<# } #>>
                                                    {{{ item.title }}}
                                                </a>
                                            <# } else { #>
                                                {{{ item.title }}}
                                            <# } #>
                                        </h3>
                                    <# } #>
                                    
                                    <# if (item.text) { #>
                                        <div class="kiallitok-text">
                                            {{{ item.text }}}
                                        </div>
                                    <# } #>
                                </div>
                            </div>
                        <# }); #>
                    </div>
                </div>
            </div>
        <# } #>
        <?php
    }
} 