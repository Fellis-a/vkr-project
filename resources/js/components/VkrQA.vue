<template>
    <div class="mt-5">
    <div class="container-fluid">
      <div class="shadow mb-4">
                  
                           <div class="accordion" role="tablist">
            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-1 variant="info"
                  >Что такое ВКР?</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-1"
                visible
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    >Выпускная квалификационная работа – выполненная обучающимся
                    (несколькими обучающимися совместно) работа, демонстрирующая
                    уровень подготовленности выпускника к самостоятельной
                    профессиональной деятельности.</b-card-text
                  >
                  <b-card-text
                    >Вид выпускной квалификационной работы, требования к ней,
                    порядок ее выполнения и критерии ее оценки устанавливаются
                    программой ГИА в соответствии с требованиями, установленными
                    стандартом. Обучающимся предоставляется возможность
                    подготовки и защиты ВКР в виде бизнес-проекта (стартапа) на
                    стадии готовности к привлечению инвестиций или уже
                    работающего бизнеса.
                  </b-card-text>
                </b-card-body>
              </b-collapse>
            </b-card>

            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-2 variant="info"
                  >Сроки</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-2"
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    >Государственная итоговая аттестация проводится в
                    соответствии с требованиями ФГОС ВО в сроки, установленные
                    календарным учебным графиком. Для ознакомления с основнвми
                    этапами подготовки ВКР и общими сроками, перейдите на
                    вкладку "Дорожная карта". С календарным учебным графиком
                    можно ознакомиться по <a href="">ссылке</a> или в личном
                    кабинете Кампус. Со стандартами ФГОС можно ознакомиться по
                    <a href="">ссылке</a>.
                  </b-card-text>
                </b-card-body>
              </b-collapse>
            </b-card>

            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-3 variant="info"
                  >Допуск к ВКР</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-3"
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    >К государственной итоговой аттестации допускается
                    обучающийся, не имеющий академической задолженности и в
                    полном объеме выполнивший учебный план или индивидуальный
                    учебный план по соответствующей образовательной программе
                    высшего образования.</b-card-text
                  >
                </b-card-body>
              </b-collapse>
            </b-card>

            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-4 variant="info"
                  >Можно ли подготовить и защитить ВКР в виде стартапа?</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-4"
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text>
                    бучающимся предоставляется возможность подготовки и защиты ВКР в виде бизнес-проекта (стартапа) на стадии готовности к привлечению инвестиций или уже работающего бизнеса. Порядок подготовки и защиты ВКР в виде бизнес-проекта (стартапа) определяется локальным нормативным актом университета.
                  </b-card-text>
                </b-card-body>
              </b-collapse>
            </b-card>

            <b-card no-body class="mb-1">
              <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block v-b-toggle.accordion-5 variant="info"
                  >В каком случае можно получить диплом с отличием?</b-button
                >
              </b-card-header>
              <b-collapse
                id="accordion-5"
                accordion="my-accordion"
                role="tabpanel"
              >
                <b-card-body>
                  <b-card-text
                    > - все указанные в приложении к диплому оценки по дисциплинам (модулям), оценки за выполнение курсовых работ (проектов), за прохождение практик, за выполнение научных исследований, за факультативные дисциплины (за исключением оценок «зачтено») являются оценками «отлично» и «хорошо»;
- все оценки по результатам государственной итоговой аттестации являются оценками «отлично»;
- количество указанных в приложении к диплому оценок «отлично», включая оценки по результатам государственной итоговой аттестации, составляет не менее 75% от общего количества оценок, указанных в приложении к диплому.
                  </b-card-text>
                </b-card-body>
              </b-collapse>
            </b-card>
          </div>

                       
                    
                    
            </div>
        </div>
    </div>
</template>

<script>
   import router from '../app.js'

    export default {
       
        data () {
            return {
               

            }
        }
        
    }
</script>
