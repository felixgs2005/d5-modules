import React, {
  Fragment,
  ReactElement,
} from 'react';

import {
  ModuleScriptDataProps,
} from '@divi/module';
import { DemoCardModuleAttrs } from './types';


/**
 * Static module's script data component.
 *
 * @since ??
 *
 * @param {ModuleScriptDataProps<DemoCardModuleAttrs>} props React component props.
 *
 * @returns {ReactElement}
 */
export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<DemoCardModuleAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

