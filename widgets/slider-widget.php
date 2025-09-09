<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ZeusWeb_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'zeusweb_slider';
    }

    public function get_title() {
        return __( 'ZeusWeb Slider', 'zeusweb' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'zeusweb' ];
    }

    protected function _register_controls() {
        // Slides Repeater Section
        $this->start_controls_section(
            'slides_section',
            [
                'label' => __( 'Slides', 'zeusweb' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __( 'Slides', 'zeusweb' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => __( 'Image', 'zeusweb' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => __( 'Title', 'zeusweb' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Slide Title', 'zeusweb' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'zeusweb' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __( 'Slide description goes here.', 'zeusweb' ),
                    ],
                ],
                'default' => [
                    [
                        'image' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
                        'title' => 'Slide 1',
                        'text' => 'Description for slide 1',
                    ],
                    [
                        'image' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
                        'title' => 'Slide 2',
                        'text' => 'Description for slide 2',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section: Heading and Text Typography/Color
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'zeusweb' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'zeusweb' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ces-slide-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __( 'Heading Typography', 'zeusweb' ),
                'selector' => '{{WRAPPER}} .ces-slide-content h2',
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'zeusweb' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ces-slide-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Text Typography', 'zeusweb' ),
                'selector' => '{{WRAPPER}} .ces-slide-content p',
            ]
        );

        $this->end_controls_section();

        // Accent Colors Section
        $this->start_controls_section(
            'accent_section',
            [
                'label' => __( 'Accent', 'zeusweb' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label' => __( 'Accent Color', 'zeusweb' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00CB98',
                'selectors' => [
                    // Buttons background
                    '{{WRAPPER}} .ces-slider-buttons button' => 'background-color: {{VALUE}} !important;',
                    // Desktop separator line (right border of image)
                    '{{WRAPPER}} .ces-slide-left::after' => 'background-color: {{VALUE}} !important;',
                    // Mobile separator line
                    '{{WRAPPER}} .ces-mobile-separator' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'accent_color_disabled',
            [
                'label' => __( 'Disabled Button Color', 'zeusweb' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#CCCCCC',
                'selectors' => [
                    '{{WRAPPER}} .ces-slider-buttons button:disabled' => 'background-color: {{VALUE}} !important; color: #666 !important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( empty( $settings['slides'] ) ) return;
        ?>
        <div class="ces-slider-widget">
            <?php foreach ( $settings['slides'] as $index => $slide ) : ?>
                <div class="ces-slide<?php echo $index === 0 ? ' active' : ''; ?>" data-index="<?php echo esc_attr($index); ?>">
                    <div class="ces-slide-left">
                        <div class="ces-slide-img-wrap">
                            <img src="<?php echo esc_url( $slide['image']['url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>">
                        </div>
                    </div>
                    <div class="ces-mobile-separator"></div>
                    <div class="ces-slide-right">
                        <div class="ces-slide-content">
                            <h2><?php echo esc_html( $slide['title'] ); ?></h2>
                            <p><?php echo esc_html( $slide['text'] ); ?></p>
                        </div>
                        <div class="ces-slider-buttons">
                            <button class="ces-prev" <?php if($index === 0) echo 'disabled'; ?>>
                                <span class="ces-arrow ces-arrow-left">
                                    <img src="/wp-content/plugins/zeusweb-widgets/assets/arrow.svg" alt="Previous" class="ces-arrow-img">
                                </span>
                            </button>
                            <button class="ces-next" <?php if($index === count($settings['slides']) - 1) echo 'disabled'; ?>>
                                <span class="ces-arrow ces-arrow-right">
                                    <img src="/wp-content/plugins/zeusweb-widgets/assets/arrow.svg" alt="Previous" class="ces-arrow-img">
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
