import { registerBlockType } from '@wordpress/blocks';

registerBlockType('acorn/post-list', {
    edit: () => {
        return wp.element.createElement(
            'p',
            {},
            'Post List Block Preview'
        );
    },
    save: () => null
});