import { domReady } from '@roots/sage/client';
import './backend/custom-styles.js';
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment, useState } = wp.element;
import { CheckboxControl } from '@wordpress/components';
import classnames from 'classnames'
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
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';


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
      hideElement: {
        type: 'boolean',
        default: false
      },
      animation: {
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
    if (!props.name.includes("core") && !props.name.includes("genesis-custom-blocks")) {
      return (
        <BlockEdit {...props} />
      );
    }

    const { attributes, setAttributes } = props;
    const { hideElement, animation } = attributes;

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
            <SelectControl
              label="Animation"
              value={animation}
              options={[
                { label: '-', value: '-' },
                { label: 'ZoomIn', value: 'scroll-reveal anim__animated anim__zoomIn' },
                { label: 'FadeIn', value: 'scroll-reveal anim__animated anim__fadeIn' },
                { label: 'FadeInUp', value: 'scroll-reveal anim__animated anim__fadeInUp' },
                { label: 'FadeInDown', value: 'scroll-reveal anim__animated anim__fadeInDown' },
                { label: 'FadeInLeft', value: 'scroll-reveal anim__animated anim__fadeInLeft' },
                { label: 'FadeInRight', value: 'scroll-reveal anim__animated anim__fadeInRight' },
              ]}
              onChange={newAnimation => setAttributes({ "animation": newAnimation })}
              __nextHasNoMarginBottom
            />
          </PanelBody>
        </InspectorControls>
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
      const { animation, hideElement } = attributes;
      // TODO: looks strange, but is used to conditionally add data to the array :magic_wand:
      const classes = [
        ...(animation === "-" ? [] : [animation]),
        ...(hideElement ? ['hidden'] : []),
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


// wp.blocks.registerBlockVariation(
//   'core/columns',
//   {
//     name: 'Wrapper',
//     title: 'Wrapper',
//     isActive: (blockAttributes, vAttributes) =>
//       blockAttributes.className
//         .includes(vAttributes.className),
//     attributes: {
//       className: 'relative grid grid-flow-col grid-cols-12 w-full px-gutter',
//       layout: {
//         inherit: true,
//       },
//       style: {
//         spacing: {
//           // padding: { top: '25px', bottom: '55px' }
//         }
//       }
//     },
//   }
// );

domReady(main);
import.meta.webpackHot?.accept(main);