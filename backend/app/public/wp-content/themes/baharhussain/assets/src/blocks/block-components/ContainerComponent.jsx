import { __ } from '@wordpress/i18n';
import { InspectorControls } from '@wordpress/block-editor';
import {
	Panel,
	PanelBody,
	PanelRow,
	RadioControl,
	SelectControl,
} from '@wordpress/components';
import DesignOption from './ContainerDesignOption.jsx';

const sprToVar = ( sprClass ) => {
	if ( ! sprClass || sprClass === 'dbt-spr-0' ) {
		return '0';
	}
	return `var(${ sprClass.replace( 'dbt-spr-', '--ths_spr_' ) })`;
};

/**
 * Sidebar inspector controls for container blocks.
 * Import into any block edit.jsx that uses container options.
 *
 * @param          props.props
 * @param {Object} props       Block props (attributes + setAttributes).
 */
export function ContainerOptions( { props } ) {
	const { attributes, setAttributes } = props;
	return (
		<InspectorControls>
			<Panel>
				<PanelBody
					title={ __( 'Container Options' ) }
					initialOpen={ true }
				>
					<div className="theme-containers container-design">
						<PanelRow>
							<h2>Background Color</h2>
						</PanelRow>
						<PanelRow>
							<DesignOption
								props={ props }
								value={ attributes.bgColor }
								DesignKey="bgColor"
								options={ [
									{
										label: 'Light Grey (Default)',
										display: '#f2f2f2',
										value: 'dbt-ctn-dft',
									},
									{
										label: 'Pure White',
										display: '#ffffff',
										value: 'dbt-ctn-dft-bg',
									},
									{
										label: 'Light Gradient',
										display: '#f2f2f2',
										value: 'ctn-gradient-bg',
									},
									{
										label: 'Light Gradient 2',
										display: '#f2f2f2',
										value: 'ctn-gradient-bg-var',
									},
									{
										label: 'Blue Gradient',
										display: '#2a3ed8',
										value: 'dbt-ctn-gradient-with-ths',
									},
									{
										label: 'Dark Blue Gradient',
										display: '#1d2c60',
										value: 'dbt-ctn-dblue-bg',
									},
								] }
							/>
						</PanelRow>
					</div>
					<hr />
					<div className="theme-containers container-width">
						<PanelRow>
							<h2>Content Width</h2>
						</PanelRow>
						<PanelRow>
							<RadioControl
								selected={ attributes.bgWidth }
								options={ [
									{
										label: '1360 - Pixels (Default)',
										value: '',
									},
									{
										label: '1130 - Pixels',
										value: 'dbt-ctn-1130',
									},
									{
										label: '1060 - Pixels',
										value: 'dbt-ctn-1060',
									},
									{
										label: '915 - Pixels',
										value: 'dbt-ctn-915',
									},
									{
										label: '848 - Pixels',
										value: 'dbt-ctn-848',
									},
									{
										label: '780 - Pixels',
										value: 'dbt-ctn-780',
									},
								] }
								onChange={ ( value ) =>
									setAttributes( { bgWidth: value } )
								}
							/>
						</PanelRow>
					</div>
					<hr />
					<div className="theme-containers container-design">
						<PanelRow>
							<h2>Content Padding</h2>
							<SelectControl
								value={ attributes.marginTop }
								label="Top"
								className="dc-sidebar-select"
								options={ [
									{
										label: '0 - Pixels',
										value: 'dbt-spr-0',
									},
									{
										label: '24 - Pixels',
										value: 'dbt-spr-24',
									},
									{
										label: '32 - Pixels',
										value: 'dbt-spr-32',
									},
									{
										label: '48 - Pixels (Default)',
										value: 'dbt-spr-48',
									},
									{
										label: '64 - Pixels',
										value: 'dbt-spr-64',
									},
									{
										label: '72 - Pixels',
										value: 'dbt-spr-72',
									},
									{
										label: '80 - Pixels',
										value: 'dbt-spr-80',
									},
								] }
								onChange={ ( value ) =>
									setAttributes( {
										marginTop: value,
									} )
								}
							/>
							<SelectControl
								value={ attributes.marginBottom }
								label="Bottom"
								className="dc-sidebar-select"
								options={ [
									{
										label: '0 - Pixels',
										value: 'dbt-spr-0',
									},
									{
										label: '24 - Pixels',
										value: 'dbt-spr-24',
									},
									{
										label: '32 - Pixels',
										value: 'dbt-spr-32',
									},
									{
										label: '48 - Pixels (Default)',
										value: 'dbt-spr-48',
									},
									{
										label: '64 - Pixels',
										value: 'dbt-spr-64',
									},
									{
										label: '72 - Pixels',
										value: 'dbt-spr-72',
									},
									{
										label: '80 - Pixels',
										value: 'dbt-spr-80',
									},
								] }
								onChange={ ( value ) =>
									setAttributes( {
										marginBottom: value,
									} )
								}
							/>
						</PanelRow>
					</div>
					<hr />
				</PanelBody>
			</Panel>
		</InspectorControls>
	);
}

/**
 * Edit-side section shell.
 * Renders <section class="etr-dbt-ctn ..."><div class="wrapper"> with
 * editor-prefixed (etr-) bgColor/bgWidth classes. Pass inner content as children.
 *
 * @param             props.props
 * @param {Object}    props                 Block props (attributes required).
 * @param {string}    [blockClass]          Fixed CSS class for this block type (e.g. 'hero-section').
 * @param {ReactNode} children              Inner content.
 * @param             props.blockProps
 * @param             props.blockRef
 * @param             props.blockClass
 * @param             props.sliderContainer
 * @param             props.children
 */
export function ContainerShell( { props, blockProps, blockRef, blockClass, sliderContainer, children } ) {
	const { attributes } = props;
	const { className } = attributes;
	const dbtCustomBlockClass = className ? className : undefined;
	const customClass = [ blockClass, dbtCustomBlockClass ]
		.filter( Boolean )
		.join( ' ' );
	const dbtWidthClass = attributes.bgWidth ? 'etr-' + attributes.bgWidth : '';
	const dbtBgColorClass = attributes.bgColor
		? 'etr-' + attributes.bgColor
		: '';
	const containerClasses = [ dbtBgColorClass, dbtWidthClass, customClass ].join(
		' '
	);
	const { className: blockPropsClass, ...restBlockProps } = blockProps || {};

	return (
		<section
			ref={ blockRef }
			className={ [ 'etr-dbt-ctn', containerClasses, blockPropsClass ].filter( Boolean ).join( ' ' ) }
			{ ...restBlockProps }
		>
			<div
				className="wrapper"
				{ ...( sliderContainer
					? { 'data-post-slider-container': true }
					: {} ) }
				style={ {
					paddingTop: sprToVar( attributes.marginTop ),
					paddingBottom: sprToVar( attributes.marginBottom ),
				} }
			>
				{ children }
			</div>
		</section>
	);
}

/**
 * Save-side section shell.
 * Renders <section class="..."><div class="wrapper"> with raw attribute classes.
 * Output is identical to the former ContainerBlockSave + ContainerBlockContent chain.
 *
 * @param             props.props
 * @param {Object}    props            Block props (attributes required).
 * @param {string}    [blockClass]     Fixed CSS class for this block type.
 * @param {ReactNode} children         Inner content.
 * @param             props.blockClass
 * @param             props.children
 */
export function ContainerShellContent( { props, blockClass, children } ) {
	const { attributes } = props;
	const { className } = attributes;
	const dbtCustomBlockClass = className || '';
	const customClasses = [ blockClass, dbtCustomBlockClass ]
		.filter( Boolean )
		.join( ' ' );
	const dbtWidthClass = attributes.bgWidth ? attributes.bgWidth : '';
	const dbtBgColorClass = attributes.bgColor ? attributes.bgColor : '';
	const containerClasses = [ dbtBgColorClass, dbtWidthClass, customClasses ].join(
		' '
	);

	return (
		<section className={ containerClasses }>
			<div
				className="wrapper"
				style={ {
					paddingTop: sprToVar( attributes.marginTop ),
					paddingBottom: sprToVar( attributes.marginBottom ),
				} }
			>
				{ children }
			</div>
		</section>
	);
}

export const dbtCustomBlockAttributes = {
	bgColor: { type: 'string', default: '' },
	bgWidth: { type: 'string', default: 'dbt-ctn-1360' },
	marginTop: {
		type: 'string',
		default: 'dbt-spr-48',
	},
	marginBottom: {
		type: 'string',
		default: 'dbt-spr-48',
	},
};
