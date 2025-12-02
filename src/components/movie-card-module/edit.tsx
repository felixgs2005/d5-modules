// External dependencies.
import React, { ReactElement } from "react";

// Divi dependencies.
import { ModuleContainer } from "@divi/module";

// Local dependencies.
import { MovieCardEditProps } from "./types";
import { ModuleStyles } from "./styles";
import { moduleClassnames } from "./module-classnames";
import { ModuleScriptData } from "./module-script-data";

export const MovieCardEdit = (props: MovieCardEditProps): ReactElement => {
  const { attrs, elements, id, name } = props;

  // Image preview
  const imageSrc = attrs?.image?.innerContent?.desktop?.value?.src ?? "";
  const imageAlt = attrs?.title?.innerContent?.desktop?.value ?? "";

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
      {elements.styleComponents({ attrName: "module" })}

      <div className="example_movie_card_module__inner">
        <div className="example_movie_card_module__image">
          <img src={imageSrc} alt={imageAlt} />
        </div>

        <div className="example_movie_card_module__content-container">
          {elements.render({ attrName: "title" })}
          {elements.render({ attrName: "tagline" })}
          {elements.render({ attrName: "genres" })}
          {elements.render({ attrName: "rating" })}
          {elements.render({ attrName: "synopsis" })}
          {elements.render({ attrName: "releaseDate" })}
          {elements.render({ attrName: "runtime" })}
        </div>
      </div>
    </ModuleContainer>
  );
};
