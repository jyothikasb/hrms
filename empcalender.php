<?php
include 'connection.php';
include 'empheader.php';
session_start();
$email=$_SESSION['email'];
?>
<style>
/*    body {
  background-color: #333;
    color: #aaa;
  font-family: 'Josefin Sans';
}*/

.calendar {
    background-color: lavender;
    color: white;
  font-family: 'Josefin Sans';
  width: 400px;
  margin: 50px auto 0;
  padding: 20px;
}

.calendar__month {
  font-size: 20px;
  font-weight: 800;
  padding: 10px 0;
  width: 100%;
  position: relative;
}

.cal-month__previous,
.cal-month__next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  width: 30px;
  height: 30px;
  text-align: center;
  
  &:hover {
    background-color: #42A5F5;
    box-shadow: 0 5px 5px -5px rgba(0,0,0,0.75);
    border-radius: 50%;
    font-weight: 800;
    color: #111;
  }
}

.cal-month__next {
  right: 0;
}

.cal-month__current {
  text-align: center;
  color: darkblue;
}

.cal-head__day,
.cal-body__day {
  display: inline-block;
  width: 50px;
  height: 50px;
  float: left;
}

.cal-body__week,
.calendar__head {
  display: block;
  height: 50px;
  width: 350px;
}

.calendar__head {
    background-color: brown;
    /*padding-left: 20px;*/
  line-height: 50px;
  position: relative;
 
  
  &:after {
    content: ' ';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1px;
    background-color: #90CAF9;
  }
}

.cal-body__day {
  color: #aaa;
  line-height: 50px;
  text-align: center;
  cursor: pointer;
}

.cal-day__month--current {
    
  color: black;
}

.cal-day__day--today {
  font-weight: 800;
  color: #2196f3;
}

.cal-day__day--selected {
  background-color: #2196f3;
  box-shadow: 0 5px 10px -5px rgba(0, 0, 0, .75);
  border-radius: 50%;
  color: #111;
}
</style>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
<div class="calendar">
  <div class="calendar__month">
    <div class="cal-month__previous"><</div>
    <div class="cal-month__current"></div>
    <div class="cal-month__next">></div>
  </div>
  <div class="calendar__head">
      <?php
      for($i=0;$i<7;$i++)
      {
          echo '<div class="cal-head__day"></div>';
      }
      ?>
<!--    <div class="cal-head__day"></div>
    <div class="cal-head__day"></div>
    <div class="cal-head__day"></div>
    <div class="cal-head__day"></div>
    <div class="cal-head__day"></div>
    <div class="cal-head__day"></div>
    <div class="cal-head__day"></div>-->
  </div>
    <div class="calendar__body">
    <?php
    for($j=0;$j<4;$j++)
    {
        echo '<div class="cal-body__week">';
        for($i=0;$i<7;$i++)
      {
          echo '<div class="cal-body__day"></div>';
      }
      echo '</div>';
    }
  
    
        
      
      ?>
<!--      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
    </div>
    <div class="cal-body__week">
        
 <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
    </div>
    <div class="cal-body__week">
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
    </div>
    <div class="cal-body__week">
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
    </div>
    <div class="cal-body__week">
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
    </div>
    <div class="cal-body__week">
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
      <div class="cal-body__day"></div>
    </div>-->
  </div>
</div>
<input type="text" id="clr" style="visibility: hidden;">
<input type="text" id="txtdt" style="visibility: hidden;">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>

<script>

class Calendar {
  
  constructor () {
    this.monthDiv = document.querySelector('.cal-month__current')
    this.headDivs = document.querySelectorAll('.cal-head__day')
    this.bodyDivs = document.querySelectorAll('.cal-body__day')
    this.nextDiv = document.querySelector('.cal-month__next')
    this.prevDiv = document.querySelector('.cal-month__previous')
  }
  
  init () {
    moment.locale(window.navigator.userLanguage || window.navigator.language) 
    
    this.month = moment()
    this.today = this.selected = this.month.clone()
    this.weekDays = moment.weekdaysShort(true)
    
    this.headDivs.forEach((day, index) => {
      day.innerText = this.weekDays[index]
    })
    
    this.nextDiv.addEventListener('click', _ => { this.addMonth() })
    this.prevDiv.addEventListener('click', _ => { this.removeMonth() })
    
    this.bodyDivs.forEach(day => {
      day.addEventListener('click', e => {
        const date = +e.target.innerHTML < 10 ? `0${e.target.innerHTML}` : e.target.innerHTML

        if (e.target.classList.contains('cal-day__month--next')) {
          this.selected = moment(`${this.month.add(1, 'month').format('YYYY-MM')}-${date}`)
        } else if (e.target.classList.contains('cal-day__month--previous')) {
          this.selected = moment(`${this.month.subtract(1, 'month').format('YYYY-MM')}-${date}`)
        } else {
          this.selected = moment(`${this.month.format('YYYY-MM')}-${date}`)
        }

        this.update()
      })
    })
    
    this.update()
  }
  
  update () {
    this.calendarDays = {
      first: this.month.clone().startOf('month').startOf('week').date(),
      last: this.month.clone().endOf('month').date()
    }
    
    this.monthDays = {
      lastPrevious: this.month.clone().subtract(1,'months').endOf('month').date(),
      lastCurrent: this.month.clone().endOf('month').date()
    }
    
    this.monthString = this.month.clone().format('MMMM YYYY')
    
    this.draw()
  }
  
  addMonth () {
    this.month.add(1, 'month')
    
    this.update()
  }
  
  removeMonth () {
    this.month.subtract(1, 'month')
    
    this.update()
  }
  
  draw () {
    this.monthDiv.innerText = this.monthString
  
    let index = 0

    if (this.calendarDays.first > 1) {
        debugger;
      for (let day = this.calendarDays.first; day <= this.monthDays.lastPrevious; index ++) {
          //let date= new Date(day+this.monthString);
          
        this.bodyDivs[index].innerText = day++

        this.cleanCssClasses(false, index)

        this.bodyDivs[index].classList.add('cal-day__month--previous')
      } 
    }

    let isNextMonth = false
    for (let day = 1; index <= this.bodyDivs.length - 1; index ++) {
      if (day > this.monthDays.lastCurrent) {
        day = 1
        isNextMonth = true
      }

      this.cleanCssClasses(true, index)

      if (!isNextMonth) {
        if (day === this.today.date() && this.today.isSame(this.month, 'day')) {
          this.bodyDivs[index].classList.add('cal-day__day--today') 
        }

        if (day === this.selected.date() && this.selected.isSame(this.month, 'month')) {
          this.bodyDivs[index].classList.add('cal-day__day--selected') 
        }

        this.bodyDivs[index].classList.add('cal-day__month--current')
      } else {
        this.bodyDivs[index].classList.add('cal-day__month--next')
      }
      let date= new Date(day+this.monthString);
      date=formatDate(date);
      document.getElementById("clr").value=date;
      var dd=$("#txtdt").val();
      $.ajax({
      url: "checkleave.php?id="+dd,
      type:'POST',
      success: function(data) 
      { 
        var dt=$.trim(data);
//        $("#color").html(dt);
        $("#txtdt").html(dt);
      },error:function(xhr,error)
        {
            alert(error); 
        }
      });
      
      var v=document.getElementById("txtdt").value;
      if(v.toString()=="1")
          document.getElementById(this.bodyDivs).style.color="Red";
      this.bodyDivs[index].innerText = day++
    }
  }
  
  cleanCssClasses (selected, index) {
    this.bodyDivs[index].classList.contains('cal-day__month--next') && 
      this.bodyDivs[index].classList.remove('cal-day__month--next')
    this.bodyDivs[index].classList.contains('cal-day__month--previous') && 
      this.bodyDivs[index].classList.remove('cal-day__month--previous')
    this.bodyDivs[index].classList.contains('cal-day__month--current') &&
      this.bodyDivs[index].classList.remove('cal-day__month--current')
    this.bodyDivs[index].classList.contains('cal-day__day--today') && 
      this.bodyDivs[index].classList.remove('cal-day__day--today')
    if (selected) {
      this.bodyDivs[index].classList.contains('cal-day__day--selected') && 
        this.bodyDivs[index].classList.remove('cal-day__day--selected') 
    }
  }
}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
const cal = new Calendar()
cal.init()</script>
