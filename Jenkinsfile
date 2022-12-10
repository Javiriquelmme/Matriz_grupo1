pipeline {
    
        stage('SonarQube analysis') {
            steps {
                withSonarQubeEnv('SonarQubePruebas') {
                    sh 'sonar-project.properties'
                }
            }
        }
    }
