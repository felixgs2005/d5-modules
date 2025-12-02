import { ModuleClassnamesParams, textOptionsClassnames } from "@divi/module";
import { MovieCardAttrs } from "./types";

export const moduleClassnames = ({
  classnamesInstance,
  attrs,
}: ModuleClassnamesParams<MovieCardAttrs>): void => {
  classnamesInstance.add(textOptionsClassnames(attrs?.module?.advanced?.text));
};
