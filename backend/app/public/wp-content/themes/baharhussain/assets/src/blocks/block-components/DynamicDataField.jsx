/**
 * EntityTokenField  -  reusable multi-select entity picker.
 *
 * Wraps Gutenberg's native `FormTokenField` with `@wordpress/core-data`
 * resolution so the result looks and behaves exactly like core Query Loop
 * filters. Zero custom CSS required.
 *
 * Supports any WordPress entity exposed through the REST API:
 *   - Post types  (posts, pages, custom post types)
 *   - Taxonomies  (categories, tags, custom taxonomies)
 *   - Users       (authors, subscribers, any role)
 *
 * --- Usage -----------------------------------------------------------
 *
 *   // Posts
 *   <EntityTokenField
 *     label="Select Posts"
 *     value={ selectedPostIds }
 *     onChange={ ( ids ) => setAttributes( { selectedPosts: ids } ) }
 *     entityKind="postType"
 *     entityName="post"
 *     maxItems={ 4 }
 *   />
 *
 *   // Authors
 *   <EntityTokenField
 *     label="Select Authors"
 *     value={ selectedAuthorIds }
 *     onChange={ ( ids ) => setAttributes( { selectedAuthors: ids } ) }
 *     entityKind="user"
 *     maxItems={ 8 }
 *     queryArgs={ { who: 'authors' } }
 *   />
 *
 *   // Categories
 *   <EntityTokenField
 *     label="Select Categories"
 *     value={ selectedCatIds }
 *     onChange={ ( ids ) => setAttributes( { selectedCategories: ids } ) }
 *     entityKind="taxonomy"
 *     entityName="category"
 *   />
 *
 *   // Pages
 *   <EntityTokenField
 *     label="Select Pages"
 *     value={ selectedPageIds }
 *     onChange={ ( ids ) => setAttributes( { selectedPages: ids } ) }
 *     entityKind="postType"
 *     entityName="page"
 *     maxItems={ 6 }
 *   />
 *
 *   // Custom Post Type
 *   <EntityTokenField
 *     label="Select Movies"
 *     value={ selectedMovieIds }
 *     onChange={ ( ids ) => setAttributes( { selectedMovies: ids } ) }
 *     entityKind="postType"
 *     entityName="movie"
 *   />
 *
 * --- Props -----------------------------------------------------------
 *
 * @param {Object}   props
 * @param {string}   props.label         Field label shown above the input.
 * @param {number[]} props.value         Array of selected entity IDs.
 * @param {Function} props.onChange      Receives the updated array of IDs.
 * @param {string}   props.entityKind    'postType' | 'taxonomy' | 'user'.
 * @param {string}   [props.entityName]  Entity slug  -  required for postType
 *                                       ('post', 'page', 'movie'...) and
 *                                       taxonomy ('category', 'post_tag'...).
 *                                       Ignored for 'user'.
 * @param {number}   [props.maxItems]    Max selections (unlimited if omitted).
 * @param {Object}   [props.queryArgs]   Extra REST args merged into every
 *                                       request (e.g. { who: 'authors' }).
 * @param {string}   [props.placeholder] Input placeholder text.
 */

import { useState, useMemo, useCallback } from '@wordpress/element';
import { useSelect } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';
import { FormTokenField } from '@wordpress/components';
import { decodeEntities } from '@wordpress/html-entities';

export default function EntityTokenField( {
	label,
	value = [],
	onChange,
	entityKind,
	entityName,
	maxItems,
	queryArgs = {},
	placeholder,
} ) {
	const [ search, setSearch ] = useState( '' );
	const isUser = entityKind === 'user';
	const isTaxonomy = entityKind === 'taxonomy';

	/* -- Stable label extractor -- */
	const getLabel = useCallback(
		( entity ) => {
			if ( ! entity ) {
				return '';
			}
			let raw;
			if ( isUser || isTaxonomy ) {
				raw = entity.name;
			} else if ( typeof entity.title === 'string' ) {
				raw = entity.title;
			} else {
				raw = entity.title?.rendered ?? '';
			}
			return decodeEntities( raw );
		},
		[ isUser, isTaxonomy ]
	);

	const fieldsParam = isUser || isTaxonomy ? 'id,name' : 'id,title';

	/* -- Data layer  -  only two queries: search + selected -- */
	const { searchResults, selectedMap } = useSelect(
		( select ) => {
			const store = select( coreStore );
			const resolve = ( q ) =>
				isUser
					? store.getUsers( q ) ?? []
					: store.getEntityRecords( entityKind, entityName, q ) ?? [];

			// Search query  -  fires only when >= 2 chars typed.
			const results =
				search.length >= 2
					? resolve( {
						search,
						per_page: 20,
						_fields: fieldsParam,
						exclude: value,
						...queryArgs,
					} )
					: [];

			// Hydrate selected IDs so tokens resolve to labels.
			const selMap = new Map();
			if ( value.length ) {
				const selected = resolve( {
					include: value,
					per_page: value.length,
					_fields: fieldsParam,
				} );
				selected.forEach( ( e ) => selMap.set( e.id, e ) );
			}

			return { searchResults: results, selectedMap: selMap };
		},
		[
			search,
			value,
			entityKind,
			entityName,
			isUser,
			fieldsParam,
			queryArgs,
		]
	);

	/* -- Derived data -- */
	const nameToId = useMemo( () => {
		const map = new Map();
		selectedMap.forEach( ( entity ) =>
			map.set( getLabel( entity ), entity.id )
		);
		searchResults.forEach( ( entity ) =>
			map.set( getLabel( entity ), entity.id )
		);
		return map;
	}, [ selectedMap, searchResults, getLabel ] );

	const tokens = useMemo(
		() =>
			value
				.map( ( id ) => getLabel( selectedMap.get( id ) ) )
				.filter( Boolean ),
		[ value, selectedMap, getLabel ]
	);

	const suggestions = useMemo(
		() => searchResults.map( getLabel ),
		[ searchResults, getLabel ]
	);

	/* -- Handlers -- */
	const handleChange = useCallback(
		( nextTokens ) => {
			const ids = nextTokens
				.map( ( token ) => nameToId.get( token ) )
				.filter( ( id ) => id !== undefined );
			onChange( ids );
		},
		[ nameToId, onChange ]
	);

	return (
		<FormTokenField
			label={ label }
			value={ tokens }
			suggestions={ suggestions }
			onInputChange={ setSearch }
			onChange={ handleChange }
			maxLength={ maxItems }
			placeholder={ placeholder }
			__experimentalAutoSelectFirstMatch
			__nextHasNoMarginBottom
		/>
	);
}
