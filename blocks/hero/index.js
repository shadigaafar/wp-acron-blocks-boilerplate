import { registerBlockType } from '@wordpress/blocks';

registerBlockType('acorn/hero', {
    edit: () => {
        return wp.element.createElement(
            'p',
            {},
            'Hero Block Preview'
        );
    },
    save: () => null
});