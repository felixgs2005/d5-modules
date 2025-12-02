// Local dependencies.
import {DemoCardModuleAttrs} from './types';


export const placeholderContent: DemoCardModuleAttrs = {
  title: {
    innerContent: {
      desktop: {
        value:"Titre placeholder",
      },
    }
  },
  description: {
    innerContent: {
      desktop: {
        value: "Description par default",
      },
    }
  },  
  image: {
    innerContent: {
      desktop: {
        value: {
          src: "https://placehold.co/600x400/EEE/31343C",
        },
      },
    },
  },
};
