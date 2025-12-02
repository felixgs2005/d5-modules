// WordPress dependencies.
import { __ } from "@wordpress/i18n";

import metadata from "./module.json";

// IMPORTANT : adapter la liste des clés à celles définies dans module.json
const customCssFields = metadata.customCssFields as Record<
  | "image"
  | "title"
  | "tagline"
  | "genres"
  | "rating"
  | "synopsis"
  | "releaseDate"
  | "runtime",
  { subName: string; selector?: string; selectorSuffix: string; label: string }
>;

// Maintenant on ajoute les labels visibles dans l’interface Divi
customCssFields.image.label = __("Image", "movie-card-module");
customCssFields.title.label = __("Title", "movie-card-module");
customCssFields.tagline.label = __("Tagline", "movie-card-module");
customCssFields.genres.label = __("Genres", "movie-card-module");
customCssFields.rating.label = __("Rating", "movie-card-module");
customCssFields.synopsis.label = __("Synopsis", "movie-card-module");
customCssFields.releaseDate.label = __("Release Date", "movie-card-module");
customCssFields.runtime.label = __("Runtime", "movie-card-module");

// Export final pour Divi
export const cssFields = { ...customCssFields };
