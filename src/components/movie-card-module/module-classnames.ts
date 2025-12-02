import { ModuleClassnamesParams, textOptionsClassnames } from "@divi/module";

import { MovieCardAttrs } from "./types";

/**
 * Module classnames function for Movie Card Module.
 *
 * @since ??
 *
 * @param {ModuleClassnamesParams<MovieCardAttrs>} param0
 */
export const moduleClassnames = ({
  classnamesInstance,
  attrs,
}: ModuleClassnamesParams<MovieCardAttrs>): void => {
  // Text Options (Divi text styling)
  classnamesInstance.add(textOptionsClassnames(attrs?.module?.advanced?.text));
};
