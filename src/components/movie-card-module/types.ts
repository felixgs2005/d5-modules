import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface MovieCardCssAttr extends Module.Css.AttributeValue {
  image?: string;
  title?: string;
  tagline?: string;
  genres?: string;
  rating?: string;
  synopsis?: string;
  releaseDate?: string;
  runtime?: string;
}

export type MovieCardCssGroupAttr = FormatBreakpointStateAttr<MovieCardCssAttr>;

export interface MovieCardAttrs extends InternalAttrs {
  // CSS options (used across multiple elements)
  css?: MovieCardCssGroupAttr;

  // Module (always keep same structure)
  module?: {
    meta?: Element.Meta.Attributes;
    advanced?: {
      link?: Element.Advanced.Link.Attributes;
      htmlAttributes?: Element.Advanced.IdClasses.Attributes;
      text?: Element.Advanced.Text.Attributes;
    };
    decoration?: Element.Decoration.PickedAttributes<
      | 'animation'
      | 'background'
      | 'border'
      | 'boxShadow'
      | 'disabledOn'
      | 'filters'
      | 'overflow'
      | 'position'
      | 'scroll'
      | 'sizing'
      | 'spacing'
      | 'sticky'
      | 'transform'
      | 'transition'
      | 'zIndex'
    >;
  };

  // Image (from API)
  image?: {
    innerContent?: Element.Types.Image.InnerContent.Attributes;
    decoration?: Element.Decoration.PickedAttributes<
      'border' | 'boxShadow' | 'filters' | 'spacing'
    >;
  };

  // Title
  title?: Element.Types.Title.Attributes;

  // Tagline
  tagline?: Element.Types.Content.Attributes;

  // Genres
  genres?: Element.Types.Content.Attributes;

  // Rating
  rating?: Element.Types.Content.Attributes;

  // Synopsis
  synopsis?: Element.Types.Content.Attributes;

  // Release date
  releaseDate?: Element.Types.Content.Attributes;

  // Runtime
  runtime?: Element.Types.Content.Attributes;
}

export type MovieCardEditProps = ModuleEditProps<MovieCardAttrs>;
