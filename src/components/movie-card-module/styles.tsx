// External dependencies.
import React, { ReactElement } from "react";

// Divi dependencies.
import { StyleContainer, StylesProps, CssStyle } from "@divi/module";

// Local dependencies.
import { MovieCardAttrs } from "./types";
import { cssFields } from "./custom-css";

/**
 * Movie Card Module Style Components
 *
 * @since ??
 */
export const ModuleStyles = ({
  attrs,
  elements,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
}: StylesProps<MovieCardAttrs>): ReactElement => {
  // Temp selector for Divi text controls (will update when your classnames exist)
  const textSelector = `${orderClass} .example_movie_card_module__container`;

  return (
    <StyleContainer mode={mode} state={state} noStyleTag={noStyleTag}>
      {/* Module wrapper */}
      {elements.style({
        attrName: "module",
        styleProps: {
          disabledOn: {
            disabledModuleVisibility: settings?.disabledModuleVisibility,
          },
        },
      })}

      {/* Image */}
      {elements.style({
        attrName: "image",
      })}

      {/* Title */}
      {elements.style({
        attrName: "title",
      })}

      {/* Tagline */}
      {elements.style({
        attrName: "tagline",
      })}

      {/* Genres */}
      {elements.style({
        attrName: "genres",
      })}

      {/* Rating */}
      {elements.style({
        attrName: "rating",
      })}

      {/* Synopsis */}
      {elements.style({
        attrName: "synopsis",
      })}

      {/* Release date */}
      {elements.style({
        attrName: "releaseDate",
      })}

      {/* Runtime */}
      {elements.style({
        attrName: "runtime",
      })}

      {/* Custom CSS (always last) */}
      <CssStyle selector={orderClass} attr={attrs.css} cssFields={cssFields} />
    </StyleContainer>
  );
};
