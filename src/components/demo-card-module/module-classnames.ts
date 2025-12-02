import { ModuleClassnamesParams, textOptionsClassnames } from '@divi/module';
import { DemoCardModuleAttrs } from './types';


/**
 * Module classnames function for Demo Card Module.
 *
 * @since ??
 *
 * @param {ModuleClassnamesParams<DemoCardModuleAttrs>} param0 Function parameters.
 */
export const moduleClassnames = ({
  classnamesInstance,
  attrs,
}: ModuleClassnamesParams<DemoCardModuleAttrs>): void => {
  // Text Options.
  classnamesInstance.add(textOptionsClassnames(attrs?.module?.advanced?.text));
};
