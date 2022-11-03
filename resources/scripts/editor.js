import { domReady } from '@roots/sage/client';
import './backend/custom-styles';
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment, useState } = wp.element;
import { CheckboxControl } from '@wordpress/components';
import classnames from 'classnames'
import Spacings from './components/Spacings';
const { InspectorControls } = wp.blockEditor;
const { PanelBody, SelectControl } = wp.components;

const getFlattened = (data, identifier) => {
  if (data) {
    const obj = Object.fromEntries(new Map(Object.entries(data[identifier]).map(([key, val]) => {
      return [identifier + '.' + key, val];
    })));
    return obj;
  } else {
    return {}
  }
}

const mapToClass = (obj) => {
  return Object.entries(obj).filter(([k, v]) => {
    return v.class !== undefined && v.class !== "-"
  }).map(([k, v]) => {
    return "!" + k.split(".").join('') + '-' + v.class;
  })
}

// https://mariecomet.fr/en/2021/12/14/adding-options-controls-existing-gutenberg-block/
// https://github.com/MarieComet/core-block-custom-attributes

/**
 * editor.main
 */

const setToolbarButtonAttribute = (settings, name) => {
  // Do nothing if it's another block than our defined ones.
  if (!name.includes("core") && !name.includes("genesis-custom-blocks")) {
    return settings;
  }

  return Object.assign({}, settings, {
    attributes: Object.assign({}, settings.attributes, {
      spacings: {
        type: 'object',
        default: {
          p: {
            t: "",
            r: "",
            b: "",
            l: ""
          },
          m: {
            t: "",
            r: "",
            b: "",
            l: ""
          }
        }
      },
      hideElement: {
        type: 'boolean',
        default: false
      },
      hoverGroup: {
        type: 'boolean',
        default: false
      },
      animation: {
        type: 'string',
        default: '-'
      },
      layoutWidth: {
        type: 'string',
        default: 'is-style-layout-default'
      },
      isLayoutOffset: {
        type: 'string',
        default: '-'
      },
      gap: {
        type: 'string',
        default: '-'
      }
    }),
  });
};

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'custom-attributes/set-toolbar-button-attribute',
  setToolbarButtonAttribute
);

const withToolbarButton = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    if (props.name.includes("genesis-custom-blocks")) {
      console.log(props);
    }


    if (!props.name.includes("core") && !props.name.includes("genesis-custom-blocks")) {
      return (
        <BlockEdit {...props} />
      );
    }

    const { attributes, setAttributes } = props;
    const { spacings, gap, hideElement, hoverGroup, isLayoutOffset, animation, layoutWidth } = attributes;

    return (
      <Fragment>
        <BlockEdit {...props} />
        <InspectorControls>
          <PanelBody
            title="Erweiterungen">
            <CheckboxControl
              label="Element nicht darstellen?"
              checked={hideElement}
              onChange={isHideElement => setAttributes({ "hideElement": isHideElement })}
            />
            <CheckboxControl
              label="Hover-Group?"
              checked={hoverGroup}
              onChange={isHoverGroup => setAttributes({ "hoverGroup": isHoverGroup })}
            />
            {
              (props.name.includes("group")) &&
              <>
              <SelectControl
                label="Layout-Breite"
                value={layoutWidth}
                options={[
                  { label: 'Tiny', value: 'is-style-layout-tiny' },
                  { label: 'Slim', value: 'is-style-layout-slim' },
                  { label: 'Default', value: 'is-style-layout-default' },
                  { label: 'Large', value: 'is-style-layout-large' },
                  { label: 'xLarge', value: 'is-style-layout-xlarge' },
                  { label: 'Full', value: 'is-style-layout-full' },
                ]}
                onChange={newLayoutWidth => setAttributes({ "layoutWidth": newLayoutWidth })}
                __nextHasNoMarginBottom
              />
              <SelectControl
                label="Gruppe randabfallend darstellen"
                value={isLayoutOffset}
                options={[
                  { label: '-', value: '-' },
                  { label: 'Gruppe links am Rand ausrichten', value: 'is-offset is-offset-left' },
                  { label: 'Gruppe rechts am Rand ausrichten', value: 'is-offset is-offset-right' },
                ]}
                onChange={newisLayoutOffset => setAttributes({ "isLayoutOffset": newisLayoutOffset })}
                __nextHasNoMarginBottom
              />
              </>
            }
            <SelectControl
              label="Animation"
              value={animation}
              options={[
                { label: '-', value: '-' },
                { label: 'ZoomIn', value: 'wow animate__animated animate__zoomIn' },
                { label: 'FadeIn', value: 'wow animate__animated animate__fadeIn' },
                { label: 'FadeInUp', value: 'wow animate__animated animate__fadeInUp' },
                { label: 'FadeInDown', value: 'wow animate__animated animate__fadeInDown' },
                { label: 'FadeInLeft', value: 'wow animate__animated animate__fadeInLeft' },
                { label: 'FadeInRight', value: 'wow animate__animated animate__fadeInRight' },
                { label: 'FadeInTopLeft', value: 'wow animate__animated animate__fadeInTopLeft' },
                { label: 'FadeInTopRight', value: 'wow animate__animated animate__fadeInTopRight' },
                { label: 'FadeInBottomLeft', value: 'wow animate__animated animate__fadeInBottomLeft' },
                { label: 'FadeInBottomRight', value: 'wow animate__animated animate__fadeInBottomRight' },
              ]}
              onChange={newAnimation => setAttributes({ "animation": newAnimation })}
              __nextHasNoMarginBottom
            />
            {
              props.name.includes("columns") &&
              <SelectControl
                label="Spaltenabstand"
                value={gap}
                options={[
                  { label: '-', value: '-' },
                  { label: '0', value: 'is-style-gap-0' },
                  { label: 'tiny', value: 'is-style-gap-tiny' },
                  { label: 'gutter', value: 'is-style-gap-gutter' },
                  { label: 'element', value: 'is-style-gap-element' },
                  { label: 'section', value: 'is-style-gap-section' },
                ]}
                onChange={gap => setAttributes({ "gap": gap })}
                __nextHasNoMarginBottom
              />
            }
          </PanelBody>
        </InspectorControls>
        <Spacings
          spacings={spacings}
          onChange={(id, value) => {
            const [k1, k2] = id.split(".");
            const newsSizes = {
              ...spacings,
              [k1]: {
                ...spacings[k1],
                [k2]: {
                  "class": value
                }
              }
            };
            setAttributes({ "spacings": newsSizes })
          }}
        />
      </Fragment>
    );
  };
}, 'withToolbarButton');


wp.hooks.addFilter(
  'editor.BlockEdit',
  'custom-attributes/with-toolbar-button',
  withToolbarButton
);

const withToolbarButtonProp = createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    if (!props.name.includes("core")) {
      return (
        <BlockListBlock {...props} />
      );
    }

    const { attributes } = props;
    return <BlockListBlock {...props} />

  };
}, 'withToolbarButtonProp');

wp.hooks.addFilter(
  'editor.BlockListBlock',
  'custom-attributes/with-toolbar-button-prop',
  withToolbarButtonProp
);

const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  const saveToolbarButtonAttribute = (extraProps, blockType, attributes) => {
    if (blockType.name.includes("core")) {
      const { spacings, animation, gap, hideElement, hoverGroup, layoutWidth, isLayoutOffset } = attributes;
      const flat_m = getFlattened(spacings, 'm')
      const flat_p = getFlattened(spacings, 'p');
      const classes_m = mapToClass(flat_m);
      const classes_p = mapToClass(flat_p);
      // TODO: looks strange, but is used to conditionally add data to the array 🪄
      const classes = [
        ...classes_m, ...classes_p,
        ...(animation === "-" ? [] : [animation]),
        ...(gap === "-" ? [] : [gap]),
        ...(layoutWidth === "is-style-layout-default" ? [] : [layoutWidth]),
        ...(hideElement ? ['hidden'] : []),
        ...(hoverGroup ? ['group'] : []),
        ...(isLayoutOffset === "-" ? [] : [isLayoutOffset]),
      ];

      if (classes.length > 0) {
        extraProps.className = classnames(extraProps.className, classes.join(" "));
      }
    }

    return extraProps;

  };

  wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'custom-attributes/save-toolbar-button-attribute',
    saveToolbarButtonAttribute
  );
}

domReady(main);
import.meta.webpackHot?.accept(main);