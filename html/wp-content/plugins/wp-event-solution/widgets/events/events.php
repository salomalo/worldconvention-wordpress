<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Etn\Utils\Utilities as Utilities;

if (!defined('ABSPATH')) exit;

class Etn_Events extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'etn-event';
	}

	/**
	 * Retrieve the widget title.
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return __('Eventin Events', 'eventin');
	}

	/**
	 * Retrieve the widget icon.
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-sort-amount-desc';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['etn-event'];
	}

	/**
	 * Register the widget controls.
	 * @access protected
	 */
	protected function _register_controls()
	{

		// Start of event section 
		$this->start_controls_section(
			'section_tab',
			[
				'label' => esc_html__('Eventin event Event', 'eventin'),
			]
		);
		$this->add_control(
			'etn_event_style',
			[
				'label' => esc_html__('Event Style', 'eventin'),
				'type' => Controls_Manager::SELECT,
				'default' => 'event-1',
				'options' => [
					'event-1'  => esc_html__('Event 1', 'eventin'),
				],
			]
		);
		$this->add_control(
			'etn_event_cat',
			[
				'label' => esc_html__('Event Category', 'eventin'),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_event_category(),
				'multiple' => true,
			]
		);
		$this->add_control(
			'etn_event_count',
			[
				'label'         => esc_html__('Event count', 'eventin'),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '6',
			]
		);
		$this->add_control(
			'etn_desc_limit',
			[
				'label'         => esc_html__('Description Limit', 'eventin'),
				'type'          => Controls_Manager::NUMBER,
				'default'       => 20,
			]
		);

		$this->add_control(
			'etn_event_col',
			[
				'label'   => esc_html__('Event column', 'eventin'),
				'type'    => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'3'  => esc_html__('4 Column ', 'eventin'),
					'4'  => esc_html__('3 Column', 'eventin'),
					'6'  => esc_html__('2 Column', 'eventin'),

				],
			]
		);
	

		$this->end_controls_section();

		// Title style section
		$this->start_controls_section(
			'title_section',
			[
				'label' => __('Title Style', 'eventin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		 => 'ent_title_typography',
				'label'		 => esc_html__('Title Typography', 'eventin'),
				'selector'	 => '{{WRAPPER}} .etn-event-content .etn-title',
			]
		);

		// tab controls start
		$this->start_controls_tabs(
			'etn_title_tabs'
		);

		$this->start_controls_tab(
			'etn_title_normal_tab',
			[
				'label' => __('Normal', 'eventin'),
			]
		);
		$this->add_control(
			'etn_title_color',
			[
				'label'		 => esc_html__('Title color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-content .etn-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .etn-event-content .etn-title a' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'etn_title_hover_tab',
			[
				'label' => __('Hover', 'eventin'),
			]
		);
		$this->add_control(
			'etn_title_hover_color',
			[
				'label'		 => esc_html__('Title Hover color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-item:hover .etn-event-content .etn-title:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .etn-event-item:hover .etn-event-content .etn-title a' => 'color: {{VALUE}};',
				],
			]
		);



		$this->end_controls_tab();

		$this->end_controls_tabs();
		// tabs control end

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__('Title margin', 'eventin'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .etn-event-content .etn-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		// designation style section 
		$this->start_controls_section(
			'desginnation_section',
			[
				'label' => __('Designation Style', 'eventin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		 => 'etn_designation_typography',
				'label'		 => esc_html__('Designation Typography', 'eventin'),
				'selector'	 => '{{WRAPPER}} .etn-event-content p',
			]
		);

		$this->add_control(
			'etn_desc_color',
			[
				'label'		 => esc_html__('Designation color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-content p' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'etn_desc_margin',
			[
				'label' => esc_html__('Description margin', 'eventin'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .etn-event-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// location style section 
		$this->start_controls_section(
			'location_style',
			[
				'label' => __('Location Style', 'eventin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		 => 'etn_location_typography',
				'label'		 => esc_html__('Location Typography', 'eventin'),
				'selector'	 => '{{WRAPPER}} .etn-event-location',
			]
		);

		$this->add_control(
			'etn_location_color',
			[
				'label'		 => esc_html__('Location color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-location' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Date style section 
		$this->start_controls_section(
			'date_style',
			[
				'label' => __('Date Style', 'eventin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'		 => 'etn_date_typography',
				'label'		 => esc_html__('Date Typography', 'eventin'),
				'selector'	 => '{{WRAPPER}} .etn-event-date',
			]
		);

		$this->add_control(
			'etn_date_color',
			[
				'label'		 => esc_html__('Date color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-date' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

			// Button style section 
			$this->start_controls_section(
				'etn_btn_style',
				[
					'label' => __('Button Style', 'eventin'),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name'		 => 'etn_btn_typography',
					'label'		 => esc_html__('Button Typography', 'eventin'),
					'selector'	 => '{{WRAPPER}} .etn-event-item .etn-btn',
				]
			);
			// tab controls start
			$this->start_controls_tabs(
				'etn_btn_tabs'
			);
	
			$this->start_controls_tab(
				'etn_btn_normal_tab',
				[
					'label' => __('Normal', 'eventin'),
				]
			);
			$this->add_control(
				'etn_btn_color',
				[
					'label'		 => esc_html__('Button color', 'eventin'),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .etn-event-item .etn-btn' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'btn_background',
					'label' => esc_html__( 'Background Color', 'eventin' ),
					'types' => [ 'gradient' ],
					'selector' => '{{WRAPPER}} .etn-event-item .etn-btn',
				]
			);

			
	
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'etn_btn_border',
					'label' => esc_html__('Border', 'eventin'),
					'selector' => '{{WRAPPER}} .etn-event-item .etn-btn',
				]
			);
	
	
			$this->end_controls_tab();
	
			$this->start_controls_tab(
				'etn_btn_hover_tab',
				[
					'label' => esc_html__('Hover', 'eventin'),
				]
			);
			$this->add_control(
				'etn_btn_hover_color',
				[
					'label'		 => esc_html__('Button Hover color', 'eventin'),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .etn-event-item .etn-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'btn_background_hover',
					'label' => esc_html__( 'Background Hover Color', 'eventin' ),
					'types' => [ 'classic','gradient' ],
					'selector' => '{{WRAPPER}} .etn-event-item .etn-btn:hover',
				]
			);

	
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'etn_btn_hover_border',
					'label' => esc_html__('Border Hover', 'eventin'),
					'selector' => '{{WRAPPER}} .etn-event-item .etn-btn:hover',
				]
			);
	
	
			$this->end_controls_tab();
	
			$this->end_controls_tabs();
			// tabs control end
	
			$this->add_responsive_control(
				'etn_btn_padding',
				[
					'label' => esc_html__('Button Padding', 'eventin'),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors' => [
						'{{WRAPPER}} .etn-event-item .etn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->end_controls_section();




		// advance style section 
		$this->start_controls_section(
			'advance_style',
			[
				'label' => __('Advance Style', 'eventin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// tab controls start
		$this->start_controls_tabs(
			'etn_content_box_tabs'
		);

		$this->start_controls_tab(
			'etn_content_box_normal_tab',
			[
				'label' => __('Normal', 'eventin'),
			]
		);
		$this->add_control(
			'etn_content_box_color',
			[
				'label'		 => esc_html__('Content box BG color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_box_border',
				'label' => esc_html__('Border', 'eventin'),
				'selector' => '{{WRAPPER}} .etn-event-item',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'conetnt_box_shadow',
				'label' => __( 'Box Shadow', 'eventin' ),
				'selector' => '{{WRAPPER}} .etn-event-item',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'etn_content_box_hover_tab',
			[
				'label' => esc_html__('Hover', 'eventin'),
			]
		);
		$this->add_control(
			'etn_content_box_hover_color',
			[
				'label'		 => esc_html__('Box Hover BG color', 'eventin'),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .etn-event-item:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_box_hover_border',
				'label' => esc_html__('BorderHover', 'eventin'),
				'selector' => '{{WRAPPER}} .etn-event-item:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'conetnt_hover_box_shadow',
				'label' => __( 'Box Hover Shadow', 'eventin' ),
				'selector' => '{{WRAPPER}} .etn-event-item:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// tabs control end

		$this->add_responsive_control(
			'etn_content_box_padding',
			[
				'label' => esc_html__('Content Box Padding', 'eventin'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .etn-event-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	
	}

	protected function render()
	{
		$settings   = $this->get_settings();
		$style      = $settings["etn_event_style"];
		include_once ETN_DIR . "/widgets/events/style/{$style}.php";
	}

	public function get_event_category()
	{
		return Utilities::get_event_category();
	}
}
