// module.exports = {
module.exports = {
    transform: {
        '^.+\\.js$': 'babel-jest',
    },
    testEnvironment: 'jsdom',
    moduleFileExtensions: ['js', 'html'],
    coverageDirectory: "coverage",


    testResultsProcessor: 'jest-sonar-reporter', // For SonarQube compatibility
    setupFilesAfterEnv: ['<rootDir>/setupTests.js'], // Reference the setup file

    testEnvironmentOptions: {
        customExportConditions: ["node", "node-addons"],
    },

};



