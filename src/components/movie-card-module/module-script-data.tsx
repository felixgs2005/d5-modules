import React, { Fragment, ReactElement } from "react";

import { ModuleScriptDataProps } from "@divi/module";

import { MovieCardAttrs } from "./types";

/**
 * Movie Card module's script data component.
 *
 * @since ??
 *
 * @param {ModuleScriptDataProps<MovieCardAttrs>} props React component props.
 *
 * @returns {ReactElement}
 */
export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<MovieCardAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: "module",
    })}
  </Fragment>
);
