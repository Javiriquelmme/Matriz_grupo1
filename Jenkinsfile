pipeline {
    agent { label 'linux' }
    options {
        buildDiscarder(logoRotator(numToKeepStr:'5'))
}
    stages{
        stage('Scan'){
            steps{
                withSonarQubeEnv(installationName: 'sq1'){
                    sh './mvnw clean org.sonarsources.scanner.maven:sonar-maven-plugin:3.9.0.2155:sonar'
                }
            }
        }
    }
}
