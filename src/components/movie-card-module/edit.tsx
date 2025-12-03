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

  // Lire les 5 Movie IDs
  const id1 = attrs?.movieId1?.innerContent?.desktop?.value ?? "";
  const id2 = attrs?.movieId2?.innerContent?.desktop?.value ?? "";
  const id3 = attrs?.movieId3?.innerContent?.desktop?.value ?? "";
  const id4 = attrs?.movieId4?.innerContent?.desktop?.value ?? "";
  const id5 = attrs?.movieId5?.innerContent?.desktop?.value ?? "";

  // Fonction utilitaire pour la preview
  const previewCard = (movieId: string, index: number) => (
    <div
      key={index}
      className={index === 0 ? "option active" : "option"}
      style={{
        // @ts-ignore
        "--optionBackground": "url(https://placehold.co/800x400/333/FFF)",
      }}
    >
      <div className="option-inner">
        {/* FRONT */}
        <div className="option-front">
          <div className="shadow"></div>
          <div className="label">
            <div className="icon">
              <i className="fas fa-film"></i>
            </div>
            <div className="info">
              <div className="main">Movie #{index + 1}</div>
              <div className="sub">ID: {movieId || "None"}</div>
            </div>
          </div>
        </div>

        {/* BACK */}
        <div className="option-back">
          <h2>Preview only</h2>
          <p>Le rendu réel sera basé sur les données TMDB (frontend PHP).</p>
          <div className="details">
            <div>
              <strong>Movie ID:</strong> {movieId || "—"}
            </div>
            <div>
              <strong>Runtime:</strong> auto
            </div>
            <div>
              <strong>Genres:</strong> auto
            </div>
          </div>
        </div>
      </div>
    </div>
  );

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
            {previewCard(id1, 0)}
            {previewCard(id2, 1)}
            {previewCard(id3, 2)}
            {previewCard(id4, 3)}
            {previewCard(id5, 4)}
          </div>
        </div>
      </div>
    </ModuleContainer>
  );
};
