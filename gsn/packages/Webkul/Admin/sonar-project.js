const sonarqubeScanner = require('sonarqube-scanner').default;

sonarqubeScanner(
    {
        serverUrl: 'http://127.0.0.1:9001',
        token: 'sqp_a6cb8105ae7c24405aa0159e94ba66c2eddd6938',
        options: {
            'sonar.projectKey': 'jsn_back',
            'sonar.projectName': 'jsn_back',
            'sonar.projectVersion': '1.0',
            'sonar.sources': 'src/Resources/assets/',
            //    'sonar.inclusions': '**/*.js', // Include only .js files
            //      'sonar.inclusions': '**/v-*.js', // Include only files starting with 'v-'
            'sonar.inclusions': '**/v-*.js,**/generatePdf.js',
            'sonar.test.inclusions': '**/*.test.js', // Explicitly include test files
            'sonar.javascript.lcov.reportPaths': 'coverage/lcov.info',
            'sonar.testExecutionReportPaths': 'test-report.xml',
            'sonar.sourceEncoding': 'UTF-8',
            'sonar.login': 'sqp_a6cb8105ae7c24405aa0159e94ba66c2eddd6938',
            'sonar.scanner.debug': 'true',
            'sonar.exclusions': '**/node_modules/**,**/dist/**',
        },
    },
    () => process.exit()
);

// jsn_front
