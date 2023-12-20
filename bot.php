config do |c|
  c.username = "logbot"
  c.realname = "Logging Bot"
  c.nick    = "logbot"
  c.server  = "irc.libera.chat"
  c.port    = 6697
end

on :connect do
  join "###tokipona"
end

on :channel, /.*/ do
  open("#{channel}.log", "a") do |log|
    log.puts "#{nick}: #{message}"
  end

  puts "#{channel}: #{nick}: #{message}"
end
