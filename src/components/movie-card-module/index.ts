// Divi dependencies.
import { type Metadata, type ModuleLibrary } from "@divi/types";

// Local dependencies.
import metadata from "./module.json";
import { MovieCardEdit } from "./edit";
import { MovieCardAttrs } from "./types";
import { placeholderContent } from "./placeholder-content";

// Styles.
import "./style.scss";
import "./module.scss";

// Registering the Movie Card Module for Divi 5
export const movieCardModule: ModuleLibrary.Module.RegisterDefinition<MovieCardAttrs> =
  {
    metadata: metadata as Metadata.Values<MovieCardAttrs>,

    placeholderContent,

    renderers: {
      edit: MovieCardEdit,
    },
  };
