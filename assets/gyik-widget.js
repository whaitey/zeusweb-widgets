/**
 * GYIK Widget JavaScript
 */

(function($) {
    'use strict';
    
    // Widget osztály
    class GYIKWidget {
        constructor(element) {
            this.element = element;
            this.container = element.find('.gyik-container');
            this.questions = element.find('.gyik-question');
            this.answers = element.find('.gyik-answer');
            this.buttons = element.find('.gyik-button');
            
            // Debug logging
            console.log('GYIK Widget initialized');
            console.log('Element:', this.element);
            console.log('Questions found:', this.questions.length);
            console.log('Answers found:', this.answers.length);
            
            this.init();
        }
        
        init() {
            this.bindEvents();
            this.setupResponsive();
            this.setupAccessibility();
        }
        
        bindEvents() {
            const self = this;
            
            // Kérdés kattintás esemény - több eseménytípus használata
            this.questions.off('click.gyik').on('click.gyik', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const target = $(this).data('target');
                self.toggleAnswer(target);
            });
            
            // Toggle ikon kattintás esemény
            this.questions.find('.gyik-toggle').off('click.gyik').on('click.gyik', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const question = $(this).closest('.gyik-question');
                const target = question.data('target');
                self.toggleAnswer(target);
            });
            
            // Billentyűzet navigáció
            this.questions.off('keydown.gyik').on('keydown.gyik', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const target = $(this).data('target');
                    self.toggleAnswer(target);
                }
            });
            
            // Gomb kattintás esemény (megakadályozza a kérdés kattintását)
            this.buttons.off('click.gyik').on('click.gyik', function(e) {
                e.stopPropagation();
            });
            
            // Reszponzív események
            $(window).off('resize.gyik').on('resize.gyik', function() {
                self.handleResize();
            });
        }
        
        toggleAnswer(target) {
            console.log('=== toggleAnswer called ===');
            console.log('Target:', target);
            console.log('Current widget element:', this.element);
            
            // Keresés a jelenlegi widgeten belül
            const question = this.element.find(`.gyik-question[data-target="${target}"]`);
            const answer = this.element.find(`.gyik-answer[data-index="${target}"]`);
            const toggle = question.find('.gyik-toggle');
            
            console.log('Question found:', question.length);
            console.log('Answer found:', answer.length);
            console.log('Question text:', question.find('.gyik-question-text').text());
            console.log('Answer text:', answer.find('.gyik-answer-content').text());
            
            // Ha már aktív, akkor bezárjuk
            if (question.hasClass('active')) {
                this.closeAnswer(question, answer, toggle);
            } else {
                // Bezárjuk az összes másik választ EZEN A WIDGETEN
                this.closeAllAnswersInThisWidget();
                // Megnyitjuk a kiválasztottat
                this.openAnswer(question, answer, toggle);
            }
        }
        
        openAnswer(question, answer, toggle) {
            // Aktív osztály hozzáadása
            question.addClass('active');
            answer.addClass('active');
            question.closest('.gyik-item').addClass('active');
            
            // Toggle ikon változtatása
            toggle.text('−');
            
            // Ne görgessünk automatikusan
            // this.scrollToQuestion(question);
            
            // Konténer méretének frissítése
            this.updateContainerHeight();
        }
        
        closeAnswer(question, answer, toggle) {
            // Aktív osztály eltávolítása
            question.removeClass('active');
            answer.removeClass('active');
            question.closest('.gyik-item').removeClass('active');
            
            // Toggle ikon visszaállítása
            toggle.text('+');
            
            // Konténer méretének frissítése
            this.updateContainerHeight();
        }
        
        closeAllAnswers() {
            this.element.find('.gyik-question').removeClass('active');
            this.element.find('.gyik-answer').removeClass('active');
            this.element.find('.gyik-item').removeClass('active');
            this.element.find('.gyik-toggle').text('+');
        }
        
        closeAllAnswersInThisWidget() {
            // Csak ezen a widgeten belül zárjuk be a válaszokat
            this.element.find('.gyik-question').removeClass('active');
            this.element.find('.gyik-answer').removeClass('active');
            this.element.find('.gyik-item').removeClass('active');
            this.element.find('.gyik-toggle').text('+');
        }
        
        scrollToAnswer(answer) {
            const offset = answer.offset().top - 100;
            $('html, body').animate({
                scrollTop: offset
            }, 300);
        }
        
        updateContainerHeight() {
            // A konténer magasságának automatikus frissítése
            this.container.css('height', 'auto');
            
            // Smooth transition a magasság változáshoz
            setTimeout(() => {
                this.container.css('transition', 'height 0.3s ease');
            }, 10);
        }
        
        setupResponsive() {
            this.handleResize();
        }
        
        handleResize() {
            const windowWidth = $(window).width();
            const container = this.container;
            
            // Mobil nézet (768px alatt)
            if (windowWidth <= 768) {
                container.addClass('mobile-view');
                
                // Ha mobil nézetben van nyitott válasz, bezárjuk
                if (this.answers.hasClass('active').length > 0) {
                    this.closeAllAnswers();
                }
            } else {
                container.removeClass('mobile-view');
            }
            
            // Tablet nézet (1024px alatt)
            if (windowWidth <= 1024) {
                container.addClass('tablet-view');
            } else {
                container.removeClass('tablet-view');
            }
        }
        
        setupAccessibility() {
            // ARIA attribútumok hozzáadása
            this.questions.each(function(index) {
                const question = $(this);
                const target = question.data('target');
                const answer = question.closest('.gyik-item').find('.gyik-answer[data-index="' + target + '"]');
                const toggle = question.find('.gyik-toggle');
                
                question.attr({
                    'role': 'button',
                    'tabindex': '0',
                    'aria-expanded': 'false',
                    'aria-controls': `gyik-answer-${target}`
                });
                
                answer.attr({
                    'id': `gyik-answer-${target}`,
                    'role': 'region',
                    'aria-labelledby': `gyik-question-${target}`
                });
                
                question.attr('id', `gyik-question-${target}`);
                
                // Toggle ikon elrejtése a képernyőolvasók elől
                toggle.attr('aria-hidden', 'true');
            });
            
            // ARIA attribútumok frissítése kattintáskor
            this.questions.on('click', function() {
                const isExpanded = $(this).hasClass('active');
                $(this).attr('aria-expanded', isExpanded);
            });
        }
        
        // Publikus metódusok
        openAll() {
            this.element.find('.gyik-question').addClass('active');
            this.element.find('.gyik-answer').addClass('active');
            this.element.find('.gyik-item').addClass('active');
            this.element.find('.gyik-toggle').text('−');
            this.updateContainerHeight();
        }
        
        closeAll() {
            this.closeAllAnswersInThisWidget();
            this.updateContainerHeight();
        }
        
        openSpecific(index) {
            const question = this.element.find(`.gyik-question[data-target="${index}"]`);
            const answer = this.element.find(`.gyik-answer[data-index="${index}"]`);
            const toggle = question.find('.gyik-toggle');
            
            this.closeAllAnswersInThisWidget();
            this.openAnswer(question, answer, toggle);
        }

        scrollToQuestion(question) {
            // Csak akkor görgetünk, ha nincs már a nézetben
            const rect = question[0].getBoundingClientRect();
            const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            const inView = rect.top >= 80 && rect.bottom <= (viewportHeight - 20);
            if (inView) return;
            
            // Állítható fejlécoffset (pl. fix fejléc esetén)
            const headerOffset = 100;
            const targetTop = question.offset().top - headerOffset;
            $('html, body').stop(true).animate({ scrollTop: targetTop }, 250);
        }
    }
    
    // Widget inicializálása amikor a DOM betöltődött
    $(document).ready(function() {
        $('.gyik-wrapper').each(function() {
            const widget = new GYIKWidget($(this));
            $(this).data('gyik-widget', widget);
        });
    });
    
    // Elementor frontend események
    $(window).on('elementor/frontend/init', function() {
        if (elementorFrontend.isEditMode()) {
            // Szerkesztő módban
            elementorFrontend.hooks.addAction('frontend/element_ready/gyik_widget.default', function($element) {
                const widget = new GYIKWidget($element);
                $element.data('gyik-widget', widget);
            });
        } else {
            // Frontend módban
            elementorFrontend.hooks.addAction('frontend/element_ready/gyik_widget.default', function($element) {
                const widget = new GYIKWidget($element);
                $element.data('gyik-widget', widget);
            });
        }
    });
    
    // Fallback inicializálás ha az Elementor hook nem működik
    $(window).on('load', function() {
        setTimeout(function() {
            $('.gyik-wrapper').each(function() {
                if (!$(this).data('gyik-widget')) {
                    const widget = new GYIKWidget($(this));
                    $(this).data('gyik-widget', widget);
                }
            });
        }, 1000);
    });
    
    // Globális függvények a widget kezeléséhez
    window.GYIKWidget = {
        // Összes GYIK widget bezárása
        closeAll: function() {
            $('.gyik-wrapper').each(function() {
                const widget = $(this).data('gyik-widget');
                if (widget) {
                    widget.closeAll();
                }
            });
        },
        
        // Összes GYIK widget megnyitása
        openAll: function() {
            $('.gyik-wrapper').each(function() {
                const widget = $(this).data('gyik-widget');
                if (widget) {
                    widget.openAll();
                }
            });
        },
        
        // Konkrét válasz megnyitása
        openAnswer: function(widgetIndex, answerIndex) {
            const widget = $(`.gyik-wrapper:eq(${widgetIndex})`).data('gyik-widget');
            if (widget) {
                widget.openSpecific(answerIndex);
            }
        }
    };
    
})(jQuery); 