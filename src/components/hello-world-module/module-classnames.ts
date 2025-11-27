import { ModuleClassnamesParams, textOptionsClassnames } from '@divi/module';
import { HelloWorldModuleAttrs } from './types';


/**
 * Module classnames function for Hello World Module.
 *
 * @since ??
 *
 * @param {ModuleClassnamesParams<HelloWorldModuleAttrs>} param0 Function parameters.
 */
export const moduleClassnames = ({
  classnamesInstance,
  attrs,
}: ModuleClassnamesParams<HelloWorldModuleAttrs>): void => {
  // Text Options.
  classnamesInstance.add(textOptionsClassnames(attrs?.module?.advanced?.text));
};
