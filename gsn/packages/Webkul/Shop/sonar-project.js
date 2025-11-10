const sonarqubeScanner = require('sonarqube-scanner').default;

sonarqubeScanner(
    {
        serverUrl: 'http://127.0.0.1:9001',
        token: 'sqp_5be8409adaa38885a93c11d5eacba7f0f06bacc0',
        options: {
            'sonar.projectKey': 'jsn_front',
            'sonar.projectName': 'jsn_front',
            'sonar.projectVersion': '1.0',
            'sonar.sources': 'src/Resources/assets/',
            //    'sonar.inclusions': '**/*.js', // Include only .js files
            //      'sonar.inclusions': '**/v-*.js', // Include only files starting with 'v-'
            'sonar.inclusions': '**/v-*.js,**/generatePdf.js',
            'sonar.test.inclusions': '**/*.test.js', // Explicitly include test files
            'sonar.javascript.lcov.reportPaths': 'coverage/lcov.info',
            'sonar.testExecutionReportPaths': 'test-report.xml',
            'sonar.sourceEncoding': 'UTF-8',
            'sonar.login': 'sqp_5be8409adaa38885a93c11d5eacba7f0f06bacc0',
            'sonar.scanner.debug': 'true',
            'sonar.exclusions': '**/node_modules/**,**/dist/**',
        },
    },
    () => process.exit()
);

// jsn_front
