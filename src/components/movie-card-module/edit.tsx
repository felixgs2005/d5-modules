// External Dependencies.
import React, { ReactElement } from "react";

// Divi Dependencies.
import { ModuleContainer } from "@divi/module";

// Local Dependencies.
import { MovieCardEditProps } from "./types";
import { ModuleStyles } from "./styles";
import { moduleClassnames } from "./module-classnames";
import { ModuleScriptData } from "./module-script-data";

import movieCardMetadata from "./module.json";

/**
 * Movie Card Module edit component (Visual Builder).
 *
 * @since ??
 *
 * @param {MovieCardEditProps} props
 *
 * @returns {ReactElement}
 */
export const MovieCardEdit = (props: MovieCardEditProps): ReactElement => {
  const { attrs, elements, id, name } = props;

  // Extract image
  const imageSrc = attrs?.image?.innerContent?.desktop?.value?.src ?? "";
  const imageAlt = attrs?.image?.innerContent?.desktop?.value?.alt ?? "";

  return (
    <ModuleContainer
      attrs={attrs}
      elements={elements}
      id={id}
      name={name}
      stylesComponent={ModuleStyles}
      classnamesFunction={moduleClassnames}
      scriptDataComponent={ModuleScriptData}
    >
      {elements.styleComponents({
        attrName: "module",
      })}

      <div className="example_movie_card_module__inner">
        {/* IMAGE */}
        <div className="example_movie_card_module__image">
          <img src={imageSrc} alt={imageAlt} />
        </div>

        {/* CONTENT */}
        <div className="example_movie_card_module__content-container">
          {/* Movie ID */}
          {elements.render({
            attrName: "movieId",
          })}

          {/* Title */}
          {elements.render({
            attrName: "title",
          })}

          {/* Tagline */}
          {elements.render({
            attrName: "tagline",
          })}

          {/* Genres */}
          {elements.render({
            attrName: "genres",
          })}

          {/* Rating */}
          {elements.render({
            attrName: "rating",
          })}

          {/* Synopsis */}
          {elements.render({
            attrName: "synopsis",
          })}

          {/* Release Date */}
          {elements.render({
            attrName: "releaseDate",
          })}

          {/* Runtime */}
          {elements.render({
            attrName: "runtime",
          })}
        </div>
      </div>
    </ModuleContainer>
  );
};
