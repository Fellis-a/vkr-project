<template>
  <div class="container-fluid">
    <div class=" mb-4">
      <b-form-group
        label="Специальность"
        label-for="road"
        label-cols-md="auto"
        class="mb-3"
      >
        <b-form-select
          id="road"
          v-model="aspect"
          :options="aspects"
        ></b-form-select>
      </b-form-group>
      <b-card>
        <b-aspect :aspect="aspect">
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-primary text-uppercase
                          mb-1
                        "
                      >
                        1 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Пояснительная записка
                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                        Завершить работу над ВКР, распечатать, сшить, подписать:
                        <p>1.1. Выпускник</p>
                        <p>1.2. Руководитель ВКР</p>
                        <p>1.3 Консультант по БЖД</p>
                        <p>
                          1.4. Директор института ИТиАД Говорков А.С. (Б-123 с
                          7.30 до 17.00)
                        </p>
                        <p>
                          1.5. Руководитель ООП (ИСТБ, ИСМБ, ИСТбп - Аршинский
                          В.Л.)
                        </p>
                        <p>
                          Тема ВКР на титульном и в задании должна строго
                          соответствовать формулировке в приказе
                        </p>
                      </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-primary text-uppercase
                          mb-1
                        "
                      >
                        за 14 дней до защиты
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-success text-uppercase
                          mb-1
                        "
                      >
                       2 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                           Антиплагиат
                       


                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                           <p> Отправить на почту lebedevaoe@ex.istu.edu для проверки на заимствование pdf-версию пояснительной записки со сканами подписанных титульного листа и задания</p>
                        <p> Лебедевой Ольге Евгеньевне</p>
                        <p> Оригинальность работы должна составлять не менее 60%</p>
                        <p> См.  памятку по антиплагиату.</p>
                      </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-success text-uppercase
                          mb-1
                        "
                      >
                        За 12 дней до защиты
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-info text-uppercase
                          mb-1
                        "
                      >
                        3 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          Справка о заимствовании
    
                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                           <p>Получить результаты проверки на заимствования и предоставить их руководителю для составления отзыва.</p>
                        <p> Справку можно забрать в Ж-300с 10:00 до 15:30</p>
                      </div>
                    </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-info text-uppercase
                          mb-1
                        "
                      >
                       За 10 дней до защиты
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-warning text-uppercase
                          mb-1
                        "
                      >
                        4 этап
                      </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          Презентация и доклад
    
                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                           <p>Подготовить презентацию и доклад</p>
                      </div>
                    </div>
                    <div
                        class="
                          text-xs
                          font-weight-bold
                          text-warning text-uppercase
                          mb-1
                        "
                      >
                        За 6 дней до защиты
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-primary text-uppercase
                          mb-1
                        "
                      >
                        5 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Портфолио
                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                        
                        <p>Заполнить портфолио в личном кабинете в Кампусе. Обязательно: знания, умения, навыки, фото.
                        </p>
                        <p>Выгрузить и распечатать версию портфолио для ГИА</p>
                        
                      </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-primary text-uppercase
                          mb-1
                        "
                      >
                        Не позднее чем за 3 дня до защиты
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-success text-uppercase
                          mb-1
                        "
                      >
                       6 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                           Загрузка ВКР

                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                         
                        <p> Загрузить в личном кабиенете в Кампусе pdf-версию пояснительной записки со сканами и подписями титульного и задания.</p>
                      </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-success text-uppercase
                          mb-1
                        "
                      >
                        Не позднее чем за 3 дня до защиты
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-info text-uppercase
                          mb-1
                        "
                      >
                        7 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          Отзыв руководителя
    
                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                          
                        <p> Получить отзыва руководителя</p>
                      </div>
                    </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-info text-uppercase
                          mb-1
                        "
                      >
                        Не позднее чем за 4 дня до защиты
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-warning text-uppercase
                          mb-1
                        "
                      >
                        8 этап
                      </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          Передача документов
    
                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                           <p>Предоставить все документы секретарю ГЭК: </p>
                           <p>пояснительная записка, 6 распечатанных презентаций, портфолио с подписью студента, справка на заимствование, отзыв руководителя, справку о внедрении</p>
                      </div>
                    </div>
                    <div
                        class="
                          text-xs
                          font-weight-bold
                          text-warning text-uppercase
                          mb-1
                        "
                      >
                        Не позднее чем за 3 дня до защиты
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
           

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-success text-uppercase
                          mb-1
                        "
                      >
                       9 этап
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                           Защита ВКР
                       


                      </div>
                      <div class="h5 mb-0 font-weight-light text-gray-800">
                           
                        <p> Прийти в назначенную аудиторию за час до защиты, сбросить презентацию и видеоролики, демонстрирующие работу разработанного ПО (если есть), проверить корректность отображения и работоспособности (лучше иметь дополнительную версию презентации в формате pdf).  </p>
                        <p> Деловая одежда!</p>
                      </div>
                      <div
                        class="
                          text-xs
                          font-weight-bold
                          text-success text-uppercase
                          mb-1
                        "
                      >
                        За час до защиты
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </b-aspect>
      </b-card>
    </div>
  </div>
</template>

<script>
export default {
  name: "VkrRoad",
  data() {
    return {
      aspect: "ИСТб",
      aspects: [
        { text: "ИСТб", value: "ИСТб" },
      ],
    };
  },
};
</script>