import { Spinner } from '@wordpress/components';
import { useMemo } from '@wordpress/element';

export default function SSRLoadingPlaceholder() {
	return (
		<div
			style={ {
				display: 'flex',
				justifyContent: 'center',
				alignItems: 'center',
				padding: '48px 0',
			} }
		>
			<Spinner />
		</div>
	);
}

/**
 * Hook that returns a stable attributes object for ServerSideRender,
 * excluding client-only keys so edits to them don't trigger a re-render.
 * @param {Object}   attributes
 * @param {string[]} clientOnlyKeys
 */
export function useSSRAttributes( attributes, clientOnlyKeys ) {
	return useMemo(
		() => {
			const filtered = { ...attributes };
			clientOnlyKeys.forEach( ( key ) => delete filtered[ key ] );
			return filtered;
		},
		clientOnlyKeys
			.map( () => null )
			.concat(
				Object.keys( attributes )
					.filter( ( key ) => ! clientOnlyKeys.includes( key ) )
					.map( ( key ) => attributes[ key ] )
			)
	);
}
