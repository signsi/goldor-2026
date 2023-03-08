<<<<<<< HEAD
import { domReady } from '@roots/sage/client';
import './backend/custom-styles.js';
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment, useState } = wp.element;
import { CheckboxControl } from '@wordpress/components';
import classnames from 'classnames'
import Spacings from './components/Spacings.js';
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
=======
import domReady from '@roots/sage/client/dom-ready';
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';
>>>>>>> 72514450 (leer läuft)

/**
 * Editor entrypoint
 */
domReady(() => {
  unregisterBlockStyle('core/button', 'outline');

  registerBlockStyle('core/button', {
    name: 'outline',
    label: 'Outline',
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
