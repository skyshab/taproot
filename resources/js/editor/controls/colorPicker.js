/**
 * WordPress dependencies
 */
const { ifCondition, compose } = wp.compose;
const {  BaseControl, ColorPalette, ColorIndicator } = wp.components;
const { __ } = wp.i18n;

// translators: first %s: The type of color (e.g. background color), second %s: the color name or value (e.g. red or #ff0000)
const colorIndicatorAriaLabel = __( '(current %s: %s)' );

export function ColorPickerControlEdit( {
    colors,
    disableCustomColors,
    label,
    onChange,
    value,
} ) {
    const colorObject = wp.blockEditor.getColorObjectByColorValue( colors, value );
    const colorName = colorObject && colorObject.name;
    const ariaLabel = sprintf( colorIndicatorAriaLabel, label.toLowerCase(), colorName || value );

    const labelElement = (
        <>
            { label }
            { value && (
                <ColorIndicator
                    colorValue={ value }
                    aria-label={ ariaLabel }
                />
            ) }
        </>
    );

    return (
        <BaseControl
            className="editor-color-palette-control"
            label={ labelElement }>
            <ColorPalette
                className="editor-color-palette-control__color-palette"
                value={ value }
                onChange={ onChange }
                { ... { colors, disableCustomColors } }
            />
        </BaseControl>
    );
}

export const ColorPickerControl = compose( [
    wp.blockEditor.withColorContext,
    ifCondition( ( { hasColorsToChoose } ) => hasColorsToChoose ),
] )( ColorPickerControlEdit );