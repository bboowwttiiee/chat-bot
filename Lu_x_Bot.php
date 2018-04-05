<?php
    include('/Users/bowtie/vendor/autoload.php'); //Подключаем библиотеку
    use Telegram\Bot\Api; 
    $telegram = new Api('569792969:AAEfx_1nb8yntAISweR_S0TDKnAIDJLMZX8'); //Устанавливаем токен, полученный у BotFather
    $result = $telegram -> getWebhookUpdates(); //Передаем в переменную $result полную информацию о сообщении пользователя
    
    $keyboard0 = [["Старт"]]; //Клавиатура
    $keyboard1 = [["Информация о нас"], ["Контакты"]];
    $keyboard2 = [["Задать вопрос"], ["Позвонить мне"], ["Назад"]]; // НЕ ЗАБЫТЬ ПРО ЗАПРОС!!!!

    $firsttext = "🏡 Люки-Невидимки в Сибири

✅ Выбор на сайте
✅ Оплата онлайн
✅ Видео информация
✅ Консультация специалиста
✅ Оперативная доставка
Подпишись на меня, нажав кнопку ниже⬇️";
    $mainmenutext = "Привет!
👷‍♀️ Я - Официальный чат-бот крупной компании в Сибири ЛюкСтрой. Меня зовут Евгения и я очень рада с тобой познакомиться! Помогу подобрать скрытый люк под плитку или под покраску и обои в стену, в потолок, на чердак, на кровлю, в пол или подвал, а также помогу заказать люк по своим размерам.";
    $onastext = "Наша компания с 2009 года является официальными представителями лучших заводов-производителей и мы предлагаем своим клиентам помощь для решения вопросов с экономичным инфракрасным обогревом жилых домов, офисов и производственных помещений, а также   практичные строительные решения дизайнеров для оформления скрытого доступа к ревизионным проёмам в стену или потолок, в пол или подвал по оптимальным ценам с гарантией. Всегда поддерживается большой запас стандартных изделий на наших складах. А с помощью ведущих курьерских служб оперативно доставим Ваш заказ в любой город РФ. Для жителей городов Сибири доставим бесплатно* в течение 1-3 дней.
Кроме этого, мы изготовим люки в пол, в стену, на чердак или на крышу по вашим индивидуальным размерам."; 
    $contactstext = "Адреса наших магазинов:
🏢 г. Москва, ул. Ленина, дом 5
🏢 г. Краснодар, пр. Мира, дом 16";
    $voprostext = "Какой у вас вопрос? Я буду рада вам помочь :)";
    $nazadtext = "Чем я могу быть полезной тебе сегодня?";
    $text = $result["message"]["text"]; //Текст сообщения
    $chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
    $name = $result["message"]["from"]["username"]; //Юзернейм пользователя

    //$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard0, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
    //$telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $firsttext, 'reply_markup' => $reply_markup ]);

    if($text){
         if ($text == "/start") {
            $reply = $mainmenutext
            $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard1, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
        }elseif ($text == "Информация о нас") {
            $reply = $onastext;
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply ]); // !!!!!!!!!!!!!!!!!!!!!!!!!!
        }elseif ($text == "Контакты") {
            $reply = $contactstext;
            $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard2, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);

            //$telegram->sendPhoto([ 'chat_id' => $chat_id, 'photo' => $url, 'caption' => "Описание." ]);
        }elseif ($text == "Задать вопрос") {
            $reply = "Какой у вас вопрос? Я буду рада вам помочь :)";
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);
            //$telegram->sendDocument([ 'chat_id' => $chat_id, 'document' => $url, 'caption' => "Описание." ]);
        }elseif ($text == "Назад"){
            $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard1, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Чем я могу быть полезной тебе сегодня?", 'reply_markup' => $reply_markup ]);
        }elseif ($text == "Позвоните мне"){
            //$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard1, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
            $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Введите номер телефона", 'reply_markup' => $reply_markup ]);
        }else{
        	$reply = "По запросу \"<b>".$text."</b>\" ничего не найдено.";
        	$telegram->sendMessage([ 'chat_id' => $chat_id, 'parse_mode'=> 'HTML', 'text' => $reply ]);
        }
    }else{
        $reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard0, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
    	$telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $firsttext ]);
    }
?>