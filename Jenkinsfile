pipeline {
    agent any
    triggers {
        pollSCM('* * * * *')
    }
    stages{
        stage('Scan'){
            steps{
                withSonarQubeEnv(installationName: 'sq1'){
                    sh './gradlew sonarqube'
                }
            }
        }
    }
}
