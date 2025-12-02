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
            {/* CARD 1 — DEADPOOL & WOLVERINE */}
            <div
              className="option active"
              style={{
                // @ts-ignore: custom CSS var
                "--optionBackground":
                  "url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/ufpeVEM64uZHPpzzeiDNIAdaeOD.jpg)",
              }}
            >
              <div className="option-inner">
                <div className="option-front">
                  <div className="shadow"></div>
                  <div className="label">
                    <div className="icon">
                      <i className="fas fa-skull"></i>
                    </div>
                    <div className="info">
                      <div className="main">Deadpool &amp; Wolverine</div>
                      <div className="sub">Action • Comedy</div>
                    </div>
                  </div>
                </div>

                <div className="option-back">
                  <h2>Deadpool &amp; Wolverine</h2>
                  <div className="rating">
                    <i className="fas fa-star"></i>
                    <span>7.6/10</span>
                  </div>

                  <div className="overview">
                    Deadpool franchit les frontières du Multivers pour
                    rencontrer Wolverine et former une alliance explosive.
                  </div>

                  <div className="details">
                    <div>
                      <strong>Release Date:</strong> 26 juillet 2024
                    </div>
                    <div>
                      <strong>Runtime:</strong> 2h 7m
                    </div>
                    <div>
                      <strong>Genre:</strong> Action, Comédie
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* CARD 2 — INSIDE OUT 2 */}
            <div
              className="option"
              style={{
                // @ts-ignore
                "--optionBackground":
                  "url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/p5ozvmdgsmbWe0H8Xk7Rc8SCwAB.jpg)",
              }}
            >
              <div className="option-inner">
                <div className="option-front">
                  <div className="shadow"></div>
                  <div className="label">
                    <div className="icon">
                      <i className="fas fa-heart"></i>
                    </div>
                    <div className="info">
                      <div className="main">Inside Out 2</div>
                      <div className="sub">Animation • Family</div>
                    </div>
                  </div>
                </div>

                <div className="option-back">
                  <h2>Inside Out 2</h2>
                  <div className="rating">
                    <i className="fas fa-star"></i>
                    <span>8.0/10</span>
                  </div>

                  <div className="overview">
                    Riley fait face à de nouvelles émotions alors qu&apos;elle
                    grandit : Anxiété, Envie, Ennui et Embarras bouleversent son
                    esprit.
                  </div>

                  <div className="details">
                    <div>
                      <strong>Release Date:</strong> 14 juin 2024
                    </div>
                    <div>
                      <strong>Runtime:</strong> 1h 36m
                    </div>
                    <div>
                      <strong>Genre:</strong> Animation, Famille
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* CARD 3 — DUNE 2 */}
            <div
              className="option"
              style={{
                // @ts-ignore
                "--optionBackground":
                  "url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/xOMo8BRK7PfcJv9JCnx7s5hj0PX.jpg)",
              }}
            >
              <div className="option-inner">
                <div className="option-front">
                  <div className="shadow"></div>
                  <div className="label">
                    <div className="icon">
                      <i className="fas fa-water"></i>
                    </div>
                    <div className="info">
                      <div className="main">Dune: Part Two</div>
                      <div className="sub">Sci-Fi • Adventure</div>
                    </div>
                  </div>
                </div>

                <div className="option-back">
                  <h2>Dune: Part Two</h2>
                  <div className="rating">
                    <i className="fas fa-star"></i>
                    <span>8.5/10</span>
                  </div>

                  <div className="overview">
                    Paul Atreides s’allie aux Fremen pour mener la guerre contre
                    l’Empire et les Harkonnen.
                  </div>

                  <div className="details">
                    <div>
                      <strong>Release Date:</strong> 1 mars 2024
                    </div>
                    <div>
                      <strong>Runtime:</strong> 2h 46m
                    </div>
                    <div>
                      <strong>Genre:</strong> Science-fiction, Aventure
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* CARD 4 — JOKER 2 */}
            <div
              className="option"
              style={{
                // @ts-ignore
                "--optionBackground":
                  "url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/AVWlQpVhpudyFsSh3OQIieHHYf.jpg)",
              }}
            >
              <div className="option-inner">
                <div className="option-front">
                  <div className="shadow"></div>
                  <div className="label">
                    <div className="icon">
                      <i className="fas fa-mask"></i>
                    </div>
                    <div className="info">
                      <div className="main">Joker: Folie à Deux</div>
                      <div className="sub">Drama • Crime</div>
                    </div>
                  </div>
                </div>

                <div className="option-back">
                  <h2>Joker: Folie à Deux</h2>
                  <div className="rating">
                    <i className="fas fa-star"></i>
                    <span>6.9/10</span>
                  </div>

                  <div className="overview">
                    Arthur Fleck poursuit sa descente dans la folie, accompagné
                    d’Harley Quinn dans un Gotham encore plus sombre.
                  </div>

                  <div className="details">
                    <div>
                      <strong>Release Date:</strong> 4 octobre 2024
                    </div>
                    <div>
                      <strong>Runtime:</strong> 2h 12m
                    </div>
                    <div>
                      <strong>Genre:</strong> Drame, Crime
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {/* CARD 5 — KINGDOM OF THE PLANET OF THE APES */}
            <div
              className="option"
              style={{
                // @ts-ignore
                "--optionBackground":
                  "url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/iHYh4cdO8ylA3W0dUxTDVdyJ5G9.jpg)",
              }}
            >
              <div className="option-inner">
                <div className="option-front">
                  <div className="shadow"></div>
                  <div className="label">
                    <div className="icon">
                      <i className="fas fa-paw"></i>
                    </div>
                    <div className="info">
                      <div className="main">
                        Kingdom of the Planet of the Apes
                      </div>
                      <div className="sub">Action • Sci-Fi</div>
                    </div>
                  </div>
                </div>

                <div className="option-back">
                  <h2>Kingdom of the Planet of the Apes</h2>
                  <div className="rating">
                    <i className="fas fa-star"></i>
                    <span>7.2/10</span>
                  </div>

                  <div className="overview">
                    Plusieurs générations après César, un jeune singe remet en
                    question l&apos;ordre établi dans un empire de primates.
                  </div>

                  <div className="details">
                    <div>
                      <strong>Release Date:</strong> 10 mai 2024
                    </div>
                    <div>
                      <strong>Runtime:</strong> 2h 25m
                    </div>
                    <div>
                      <strong>Genre:</strong> Action, Science-fiction
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
