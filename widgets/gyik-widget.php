<?php
/**
 * GYIK Widget Class
 */

if (!defined('ABSPATH')) {
    exit;
}

class ZeusWeb_GYIK_Widget extends \Elementor\Widget_Base {
    
    public function get_name() {
        return 'zeusweb_gyik_widget';
    }
    
    public function get_title() {
        return esc_html__('GYIK Widget', 'gyik-elementor-widget');
    }
    
    public function get_icon() {
        return 'eicon-help-o';
    }
    
    public function get_categories() {
        return ['zeusweb'];
    }
    
    public function get_keywords() {
        return ['gyik', 'faq', 'kérdések', 'válaszok', 'accordion'];
    }
    
    protected function register_controls() {
        // Tartalom szekció
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Tartalom', 'gyik-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'question',
            [
                'label' => esc_html__('Kérdés', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Kérdés', 'gyik-elementor-widget'),
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'answer',
            [
                'label' => esc_html__('Válasz', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Válasz', 'gyik-elementor-widget'),
                'show_label' => false,
            ]
        );
        
        $repeater->add_control(
            'show_button',
            [
                'label' => esc_html__('Gomb megjelenítése', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Igen', 'gyik-elementor-widget'),
                'label_off' => esc_html__('Nem', 'gyik-elementor-widget'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        
        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Gomb szövege', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Kattints ide', 'gyik-elementor-widget'),
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );
        
        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Gomb link', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gyik-elementor-widget'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'faq_items',
            [
                'label' => esc_html__('GYIK elemek', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'question' => esc_html__('Első kérdés?', 'gyik-elementor-widget'),
                        'answer' => esc_html__('Első válasz.', 'gyik-elementor-widget'),
                    ],
                    [
                        'question' => esc_html__('Második kérdés?', 'gyik-elementor-widget'),
                        'answer' => esc_html__('Második válasz.', 'gyik-elementor-widget'),
                    ],
                ],
                'title_field' => '{{{ question }}}',
            ]
        );
        
        $this->end_controls_section();
        
        // Stílus szekciók
        $this->start_controls_section(
            'section_style_container',
            [
                'label' => esc_html__('Konténer', 'gyik-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__('Keret', 'gyik-elementor-widget'),
                'selector' => '{{WRAPPER}} .gyik-container',
            ]
        );
        
        $this->add_control(
            'container_border_radius',
            [
                'label' => esc_html__('Keret sugár', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gyik-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'container_background_color',
            [
                'label' => esc_html__('Háttér szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-container' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'container_padding',
            [
                'label' => esc_html__('Belső térköz', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gyik-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        // Kérdés stílus
        $this->start_controls_section(
            'section_style_question',
            [
                'label' => esc_html__('Kérdés', 'gyik-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'question_typography',
                'selector' => '{{WRAPPER}} .gyik-question',
            ]
        );
        
        $this->add_control(
            'question_color',
            [
                'label' => esc_html__('Szöveg szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-question' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'question_background_color',
            [
                'label' => esc_html__('Háttér szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-question' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'question_padding',
            [
                'label' => esc_html__('Belső térköz', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gyik-question' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        // Válasz stílus
        $this->start_controls_section(
            'section_style_answer',
            [
                'label' => esc_html__('Válasz', 'gyik-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'answer_typography',
                'selector' => '{{WRAPPER}} .gyik-answer',
            ]
        );
        
        $this->add_control(
            'answer_color',
            [
                'label' => esc_html__('Szöveg szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-answer' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'answer_background_color',
            [
                'label' => esc_html__('Háttér szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-answer' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'answer_padding',
            [
                'label' => esc_html__('Belső térköz', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gyik-answer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        // Gomb stílus
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Gomb', 'gyik-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->start_controls_tabs('button_styles');
        
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__('Normál', 'gyik-elementor-widget'),
            ]
        );
        
        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Szöveg szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Háttér szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__('Hover', 'gyik-elementor-widget'),
            ]
        );
        
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Szöveg szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Háttér szín', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gyik-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .gyik-button',
                'separator' => 'before',
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .gyik-button',
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Keret sugár', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gyik-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Belső térköz', 'gyik-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .gyik-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if (empty($settings['faq_items'])) {
            return;
        }
        
        $this->add_render_attribute('wrapper', 'class', 'gyik-wrapper');
        ?>
        
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <div class="gyik-container">
                <?php foreach ($settings['faq_items'] as $index => $item) : ?>
                    <div class="gyik-item" data-index="<?php echo $index; ?>">
                        <div class="gyik-question-wrapper">
                            <div class="gyik-question" data-target="<?php echo $index; ?>">
                                <span class="gyik-toggle">+</span>
                                <span class="gyik-question-text"><?php echo esc_html($item['question']); ?></span>
                            </div>
                            <?php if ($item['show_button'] === 'yes' && !empty($item['button_text'])) : ?>
                                <div class="gyik-button-wrapper">
                                    <a href="<?php echo esc_url($item['button_link']['url']); ?>" 
                                       class="gyik-button"
                                       <?php echo $item['button_link']['is_external'] ? 'target="_blank"' : ''; ?>
                                       <?php echo $item['button_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                        <?php echo esc_html($item['button_text']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="gyik-answer" data-index="<?php echo $index; ?>">
                            <div class="gyik-answer-content">
                                <?php echo wp_kses_post($item['answer']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <?php
    }
    
    protected function content_template() {
        ?>
        <# if (settings.faq_items.length) { #>
            <div class="gyik-wrapper">
                <div class="gyik-container">
                    <# _.each(settings.faq_items, function(item, index) { #>
                        <div class="gyik-item" data-index="{{ index }}">
                            <div class="gyik-question-wrapper">
                                <div class="gyik-question" data-target="{{ index }}">
                                    <span class="gyik-toggle">+</span>
                                    <span class="gyik-question-text">{{{ item.question }}}</span>
                                </div>
                                <# if (item.show_button === 'yes' && item.button_text) { #>
                                    <div class="gyik-button-wrapper">
                                        <a href="{{ item.button_link.url }}" 
                                           class="gyik-button"
                                           <# if (item.button_link.is_external) { #>target="_blank"<# } #>
                                           <# if (item.button_link.nofollow) { #>rel="nofollow"<# } #>>
                                            {{{ item.button_text }}}
                                        </a>
                                    </div>
                                <# } #>
                            </div>
                            <div class="gyik-answer" data-index="{{ index }}">
                                <div class="gyik-answer-content">
                                    {{{ item.answer }}}
                                </div>
                            </div>
                        </div>
                    <# }); #>
                </div>
            </div>
        <# } #>
        <?php
    }
} 