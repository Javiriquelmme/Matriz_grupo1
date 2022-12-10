pipeline {
    agent any
    triggers {
        pollSCM('* * * * *')
    }
    stages {
        stage("Compile") {
            steps {
                sh "./public "
            }
        }
        stage('SonarQube analysis') {
            steps {
                withSonarQubeEnv('SonarQubePruebas') {
                    sh './sonar-project.properties'
                }
            }
        }
    }
}
