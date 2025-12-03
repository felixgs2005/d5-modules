import { ModuleEditProps } from "@divi/module-library";
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from "@divi/types";

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
  css?: MovieCardCssGroupAttr;

  module?: {
    meta?: Element.Meta.Attributes;
    advanced?: {
      link?: Element.Advanced.Link.Attributes;
      htmlAttributes?: Element.Advanced.IdClasses.Attributes;
      text?: Element.Advanced.Text.Attributes;
    };
    decoration?: Element.Decoration.PickedAttributes<
      | "animation"
      | "background"
      | "border"
      | "boxShadow"
      | "disabledOn"
      | "filters"
      | "overflow"
      | "position"
      | "scroll"
      | "sizing"
      | "spacing"
      | "sticky"
      | "transform"
      | "transition"
      | "zIndex"
    >;
  };

  image?: {
    innerContent?: Element.Types.Image.InnerContent.Attributes;
    decoration?: Element.Decoration.PickedAttributes<
      "border" | "boxShadow" | "filters" | "spacing"
    >;
  };

  /** FIVE MOVIE IDs (NEW FIELDS YOU ADDED IN module.json) **/
  movieId1?: Element.Types.Content.Attributes;
  movieId2?: Element.Types.Content.Attributes;
  movieId3?: Element.Types.Content.Attributes;
  movieId4?: Element.Types.Content.Attributes;
  movieId5?: Element.Types.Content.Attributes;

  /** OPTIONAL FIELDS (NOT USED IN YOUR CURRENT DESIGN, BUT SAFE TO KEEP) **/
  title?: Element.Types.Title.Attributes;
  tagline?: Element.Types.Content.Attributes;
  genres?: Element.Types.Content.Attributes;
  rating?: Element.Types.Content.Attributes;
  synopsis?: Element.Types.Content.Attributes;
  releaseDate?: Element.Types.Content.Attributes;
  runtime?: Element.Types.Content.Attributes;
}

export type MovieCardEditProps = ModuleEditProps<MovieCardAttrs>;
