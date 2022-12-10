pipeline {
    agent any
    triggers {
        pollSCM('* * * * *')
    }
        stage('SonarQube analysis') {
            steps {
                withSonarQubeEnv('SonarQubePruebas') {
                    sh 'sonar-project.properties'
                }
            }
        }
    }
