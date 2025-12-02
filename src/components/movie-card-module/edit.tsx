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

  const imageSrc = attrs?.image?.innerContent?.desktop?.value?.src ?? "";

  // On utilise la custom property CSS comme dans ton HTML:
  const cardStyle: React.CSSProperties = imageSrc
    ? ({
        // TS oblige à caster pour les variables CSS custom
        ["--optionBackground" as any]: `url(${imageSrc})`,
      } as React.CSSProperties)
    : {};

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

      <div className="movie-cards-container">
        <div className="movie-cards-wrapper">
          <div className="options">
            {/* Une seule carte (active) qui utilise tous tes champs Divi */}
            <div className="option active" style={cardStyle}>
              <div className="option-inner">
                {/* FRONT */}
                <div className="option-front">
                  <div className="shadow"></div>
                  <div className="label">
                    <div className="icon">
                      {/* Tu peux changer l’icône si tu veux */}
                      <i className="fas fa-film"></i>
                    </div>
                    <div className="info">
                      <div className="main">
                        {elements.render({ attrName: "title" })}
                      </div>
                      <div className="sub">
                        {elements.render({ attrName: "genres" })}
                      </div>
                    </div>
                  </div>
                </div>

                {/* BACK */}
                <div className="option-back">
                  {/* Titre grand */}
                  {elements.render({ attrName: "title" })}

                  {/* Rating */}
                  <div className="rating">
                    <i className="fas fa-star"></i>
                    <span>{elements.render({ attrName: "rating" })}</span>
                  </div>

                  {/* Synopsis */}
                  <div className="overview">
                    {elements.render({ attrName: "synopsis" })}
                  </div>

                  {/* Détails */}
                  <div className="details">
                    <div>
                      <strong>Release Date:</strong>{" "}
                      {elements.render({ attrName: "releaseDate" })}
                    </div>
                    <div>
                      <strong>Runtime:</strong>{" "}
                      {elements.render({ attrName: "runtime" })}
                    </div>
                    <div>
                      <strong>Genres:</strong>{" "}
                      {elements.render({ attrName: "genres" })}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </ModuleContainer>
  );
};
