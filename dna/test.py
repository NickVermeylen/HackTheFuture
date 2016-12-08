

# manually assign the partition list for the consumer
from kafka import TopicPartition
from kafka import KafkaConsumer

consumer = KafkaConsumer('showMe',
                         group_id='1',
                         bootstrap_servers=['http://team2.htf.cloud.tothepoint.company:30205'])

for message in consumer:
    # message value and key are raw bytes -- decode if necessary!
    # e.g., for unicode: `message.value.decode('utf-8')`
    print ("%s:%d:%d: key=%s value=%s" % (message.topic, message.partition,
                                          message.offset, message.key,
                                          message.value))
