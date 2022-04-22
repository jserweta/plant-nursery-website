module.exports = {
  cleancss: {
    opts: {
      compatibility: 'ie11,-properties.merging',
      level: {
        1: {
          specialComments: false,
          removeQuotes: true,
          removeWhitespace: true,
          tidyAtRules: true,
          cleanupCharsets: true,
          selectorsSortingMethod: 'natural'
        },
        2: {
          mergeSemantically: false,
          overrideProperties: true,
          removeEmpty: true,
          removeDuplicateRules: true,
          reduceNonAdjacentRules: true,
          removeDuplicateFontRules: true,
          removeDuplicateMediaBlocks: true,
          removeUnusedAtRules: true,
          restructureRules: true
        }
      }
    }
  },
  rename: {
    min: {
      suffix: '.min'
    }
  },
  browsersync: {
    src: ['css/*'],
    opts: {
      logLevel: 'debug',
      injectChanges: true,
      proxy: 'http://mikulscy.local/',
      browser: 'Google Chrome',
      open: false,
      notify: true
    },
    watch: [
      '**/*.php',
      'js/src/**/*.js'
    ]
  },
  styles: {
    main: 'sass/base/global.scss',
    src: '**/*.{sass,scss}',
    dest: 'css',
    exclude: ['!' + 'sass/navigation/_burger.scss', '!' + 'sass/base/_normalize.scss', '!' + 'css/global.css', '!' + 'css/global.min.css'],
    stylelint: {
      opts: {
        fix: false,
        ignoreFiles: ['!*.scss'],
        reporters: [{
          formatter: 'string',
          console: true,
          failAfterError: false,
          debug: false
        }]
      }
    },
    opts: {
      development: {
        bundleExec: true,
        style: 'expanded',
        debugInfo: true,
        lineNumbers: true,
        errLogToConsole: true,
        includePaths: ['node_modules/']
      },
      production: {
        bundleExec: true,
        style: 'compressed',
        debugInfo: true,
        lineNumbers: true,
        errLogToConsole: true,
        includePaths: ['node_modules/']
      }
    }
  },
  js: {
    main: 'js/src/*.js',
    src: 'js/src/**/*.js',
    dest: 'js/dist/'
  },
  php: {
    src: '**/*.php'
  },
  // phpcs: {
  //   src: ['**/*.php', '!' + 'node_modules/**/*'],
  //   opts: {
  //     bin: 'C:/xampp/php/phpcs.bat',
  //     standard: 'phpcs.xml',
  //     warningSeverity: 0
  //   }
  // }
};
